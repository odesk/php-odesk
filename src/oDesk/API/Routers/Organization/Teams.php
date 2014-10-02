<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Teams info
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
 * Teams info
 *
 * @link http://developers.odesk.com/Organization-APIs
 */
final class Teams extends ApiClient
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
     * Get Teams info
     *
     * @return object
     */
    public function getList()
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/hr/v2/teams');
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Get Users in Team
     *
     * @param   integer $teamReference Team reference
     * @return  object
     */
    public function getUsersInTeam($teamReference)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/hr/v2/teams/' . $teamReference . '/users');
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
