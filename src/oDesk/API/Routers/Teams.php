<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Team API
 *
 * @final
 * @package     oDeskAPI
 * @since       05/19/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link https://developers.odesk.com/api-tos.html}
 */

namespace oDesk\API\Routers;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * Team API
 *
 * @link http://developers.odesk.com/Team-API
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
     * Get Team Rooms
     *
     * @return  object
     */
    public function getList()
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/team/v2/teamrooms');
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Get specific team or company
     *
     * @param   string $team Teamroom or company ID
     * @param   array $params (Optional) Parameters
     * @return  object
     */
    public function getSpecific($team, $params = array())
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/team/v2/teamrooms/' . $team, $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
