<?php
/**
 * Authentication library for oDesk API using OAuth
 *
 * @final
 * @package     oDeskAPI
 * @since       04/21/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link https://developers.odesk.com/api-tos.html}
 */
session_start();

require __DIR__ . '/vendor/autoload.php';

$config = new \oDesk\API\Config(
    array(
        'consumerKey'       => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxx',  // SETUP YOUR CONSUMER KEY
        'consumerSecret'    => 'xxxxxxxxxxxxx',                  // SETUP YOUR KEY SECRET
        'accessToken'       => $_SESSION['access_token'],       // got access token
        'accessSecret'      => $_SESSION['access_secret'],      // got access secret
        'requestToken'      => $_SESSION['request_token'],      // got request token
        'requestSecret'     => $_SESSION['request_secret'],     // got request secret
        'verifier'          => $_GET['oauth_verifier'],         // got oauth verifier after authorization
        'mode'              => 'web',                           // can be 'nonweb' for console apps (default),
                                                                // and 'web' for web-based apps
//	'debug' => true, // enables debug mode. Note that enabling debug in web-based applications can block redirects
//	'authType' => 'MyOAuth' // your own authentication type, see AuthTypes directory
    )
);

$client = new \oDesk\API\Client($config);

if (empty($_SESSION['request_token']) && empty($_SESSION['access_token'])) {
    // we need to get and save the request token. It will be used again
    // after the redirect from the oDesk site
    $requestTokenInfo = $client->getRequestToken();

    $_SESSION['request_token']  = $requestTokenInfo['oauth_token'];
    $_SESSION['request_secret'] = $requestTokenInfo['oauth_token_secret'];
    // request authorization
    $client->auth();
} elseif (empty($_SESSION['access_token'])) {
    // the callback request should be pointed to this script as well as
    // the request access token after the callback
    $accessTokenInfo = $client->auth();

    $_SESSION['access_token']   = $accessTokenInfo['access_token'];
    $_SESSION['access_secret']  = $accessTokenInfo['access_secret'];
}
// $accessTokenInfo has the following structure
// array('access_token' => ..., 'access_secret' => ...);
// keeps the access token in a secure place

// if authenticated
if ($_SESSION['access_token']) {
    // clean up session data
    unset($_SESSION['request_token']);
    unset($_SESSION['request_secret']);

    // gets a list of trays for the authenticated user
    $mc = new \oDesk\API\Routers\Mc($client);
    $trays = $mc->getTrays();

    print_r($trays);

    // gets info of the authenticated user
    $auth = new \oDesk\API\Routers\Auth($client);
    $info = $auth->getUserInfo();

    print_r($info);

    // attempts to start a new message thread with wrong parameters
    // to test an error response from the server (the subject is missing)
    $params = array(
        'recipients' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
        'body' => 'this is a test message from oDesk Library'
    );
    $newThread = $mc->startNewThread('myuseruid', $params);

    print_r($newThread);
}
