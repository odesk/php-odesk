<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Get users info
 *
 * @final
 * @package     oDeskAPI
 * @since       05/16/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link https://developers.odesk.com/api-tos.html}
 */

namespace oDesk\API\Routers\Organization;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * Get user info
 *
 * @link http://developers.odesk.com/Organization-APIs
 */
final class Users extends ApiClient
{
    const ENTRY_POINT = ODESK_API_EP_NAME;

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
        ApiDebug::p('init ' . __CLASS__ . ' router');
        $this->_client = $client;
        parent::$_epoint = self::ENTRY_POINT;
    }

    /**
     * Get Auth User Info
     *
     * @return object
     */
    public function getMyInfo()
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/hr/v2/users/me');
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
