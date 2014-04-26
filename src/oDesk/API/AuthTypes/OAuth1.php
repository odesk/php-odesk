<?php
/**
 * oDesk auth library for using with public API by OAuth
 *
 * @final
 * @package     oDeskAPI
 * @since       04/22/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com> 
 * @license     oDesk's API Terms of Use {@link http://developers.odesk.com/API-Terms-of-Use}
 */

namespace oDesk\API\AuthTypes;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Config as ApiConfig;
use oDesk\API\Interfaces\Client as ApiClient;
use oDesk\API\Utils as ApiUtils;
use oDesk\API\ApiException as ApiException;

/**
 * OAuth 1.0a Client
 */
final class OAuth1 implements ApiClient
{

    const URL_AUTH      = '/services/api/auth';
    const URL_ATOKEN    = '/auth/v1/oauth/token/access';
    const URL_RTOKEN    = '/auth/v1/oauth/token/request';

    /**
     * @var Consumer key
     */
    static private $_apiKey = null;
    /**
     * @var Consumer secret
     */
    static private $_secret = null;
    /**
     * @var oauth_token, shared request token (temporary)
     */
    static private $_requestToken = null;
    /**
     * @var oauth_token_secret (temporary)
     */
    static private $_requestSecret = null;
    /**
     * @var Final access token
     */
    static private $_accessToken = null;
    /**
     * @var Final access token secret
     */
    static private $_accessSecret = null;
    /**
     * @var OAuth verifier
     */
    static private $_verifier = null;
    /**
     * @var Entry point name
     */
    static private $_epoint = 'api';
    /**
     * @var Application mode
     */
    static private $_mode = 'web';
    /**
     * @var SSL verification flag
     */
    static private $_verifySsl = true;
    /**
     * @var Signature method
     */
    static private $_sigMethod = 'HMAC-SHA1';

    /**
     * Constructor 
     * 
     * @param   string $key Application key
     * @param	string $secret Secret key
     * @access  public
     * @throws  ApiException Wrong key or secret
     */
    public function __construct($key, $secret)
    {
        ApiDebug::p('starting ' . __CLASS__ . ' authentication');

        if (!$secret) {
            throw new ApiException('You must define "secret key".');
        } else {
            self::$_secret = (string) $secret;
        }

        if (!$key) {
            throw new ApiException('You must define "application key".');
        } else {
            self::$_apiKey = (string) $key;
        }
    }

    /**
     * Set option
     *
     * @param   string $option Option name
     * @param   mixed $value Option value
     * @access  public
     * @return  boolean
     */
    public static function option($option, $value)
    {
        $name = '_' . $option;

        $r = new \ReflectionClass('\\' . __CLASS__);
        try {
            $r->getProperty($name);
            self::$$name = $value;
            return true;
        } catch (\ReflectionException $e) {
            return false;
        }
    }

    /**
     * Auth process 
     * 
     * @access  public
     * @return  string
     */
    public function auth()
    {
        ApiDebug::p('running auth process in ' . __CLASS__);

        if (self::$_accessToken === null && self::$_verifier === null) {
            if (self::$_requestToken === null && self::$_requestSecret === null) {
                // web-based application should setup and save request token itself
                // to be able use it after callback
                $this->setupRequestToken();
            }

            $authUrl = ApiUtils::getFullUrl(self::URL_AUTH) .
            '?oauth_token=' . self::$_requestToken;

            if (self::$_mode === 'web') {
                // authorize web application via browser
                header('Location: ' . $authUrl);
            } elseif (self::$_mode === 'nonweb') {
                // authorize nonweb application
                ApiDebug::p('found [nonweb] mode, need to autorize application manually');

                $prompt = 'Visit ' . $authUrl . "\n" .
                    'and provide oauth_verifier for further authorization' . "\n" .
                    '$ ';
                if (PHP_OS == 'WINNT') {
                    echo $prompt;
                    $verifier = stream_get_line(STDIN, 1024, PHP_EOL);
                } else {
                    $verifier = readline($prompt);
                }

                // get access token
                $this->_setupAccessToken($verifier);
            }
        } elseif (self::$_accessToken == null && self::$_verifier !== null) {
            // get access token, web-based callback
            $this->_setupAccessToken(self::$_verifier);
        } else {
            // access_token isset
        }

        return array(
            'access_token'  => self::$_accessToken,
            'access_secret' => self::$_accessSecret
        );
    }

    /**
     * Do request 
     * 
     * @param   string $type Type of request
     * @param   string $url URL
     * @param   array $params (Optional) Parameters
     * @static
     * @access  public
     * @return  mixed
     */
    public function request($type, $url, $params = array())
    {
        ApiDebug::p('running request from ' . __CLASS__);

        $authType = ($type == 'GET') ? OAUTH_AUTH_TYPE_URI : OAUTH_AUTH_TYPE_FORM;

        $oauth = $this->_getOAuthInstance($authType);

        $oauth->setToken(self::$_accessToken, self::$_accessSecret);
        try {
            $oauth->fetch(ApiUtils::getFullUrl($url, self::$_epoint), $params, $type);
        } catch (\OAuthException $e) {
            //
        }

        $data = $oauth->getLastResponse();

        ApiDebug::p('got response from server', $data);

        return $data;
    }

    /**
     * Get and setup request token
     *
     * @access  public
     * @return  array
     */
    public function setupRequestToken()
    {
        ApiDebug::p('query request token from server');

        $oauth = $this->_getOAuthInstance(OAUTH_AUTH_TYPE_FORM);
        $requestTokenInfo = $oauth->getRequestToken(
            ApiUtils::getFullUrl(self::URL_RTOKEN, 'api')
        );
        ApiDebug::p('got request token info', $requestTokenInfo);

        self::$_requestToken  = $requestTokenInfo['oauth_token'];
        self::$_requestSecret = $requestTokenInfo['oauth_token_secret'];

        return $requestTokenInfo;
    }

    /**
     * Get access token
     *
     * @param	string $verifier OAuth verifier, got after authorization
     * @access	private
     * @return	array
     */
    private function _setupAccessToken($verifier)
    {
        ApiDebug::p('requesting access token');

        $oauth = $this->_getOAuthInstance(OAUTH_AUTH_TYPE_FORM);
        $oauth->setToken(self::$_requestToken, self::$_requestSecret);
        $accessTokenInfo = $oauth->getAccessToken(
            ApiUtils::getFullUrl(self::URL_ATOKEN, 'api'),
            null,
            $verifier
        );

        ApiDebug::p('got access token info', $accessTokenInfo);

        self::$_accessToken     = $accessTokenInfo['oauth_token'];
        self::$_accessSecret    = $accessTokenInfo['oauth_token_secret'];

        return $accessTokenInfo;
    }

    /**
     * Get OAuth instance
     *
     * @param   integer $authType Auth type
     * @access  public
     * @return  object
     */
    private function _getOAuthInstance($authType)
    {
        ApiDebug::p('get OAuth instance');

        $oauth = new \OAuth(
            self::$_apiKey,
            self::$_secret,
            self::$_sigMethod,
            $authType
        );

        if (ApiConfig::get('debug')) {
            $oauth->enableDebug();
        }

        if (!self::$_verifySsl) {
            $oauth->disableSSLChecks();
        }

        return $oauth;
    }
}
