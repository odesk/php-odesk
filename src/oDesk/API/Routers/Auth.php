<?php
/**
 * oDesk auth library for using with public API by OAuth
 * My Info
 *
 * @final
 * @package     oDeskAPI
 * @since       04/21/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link http://developers.odesk.com/API-Terms-of-Use}
 */

namespace oDesk\API\Routers;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * My Info
 *
 * @link http://developers.odesk.com/My%20Info
 */
final class Auth extends ApiClient
{
    const ENTRY_POINT = 'api';

    /**
     * @var Client instance
     */
    private $_client;

    /**
     * Constructor
     *
     * @param   ApiClient $client Client object
     */
    public function __construct(ApiClient $client)
    {
        ApiDebug::p('init auth router');
        $this->_client = $client;
        parent::$_epoint = self::ENTRY_POINT;
    }

    /**
     * My Info
     *
     * @return object
     */
    public function getUserInfo()
    {
        ApiDebug::p('getUserInfo');

        $info = $this->_client->get('/auth/v1/info');
        ApiDebug::p('found auth info', $info);

        return $info;
    }
}
