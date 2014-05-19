<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Snapshot info
 *
 * @final
 * @package     oDeskAPI
 * @since       05/19/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link http://developers.odesk.com/API-Terms-of-Use}
 */

namespace oDesk\API\Routers;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * Snapshot info
 *
 * @link http://developers.odesk.com/Snapshot
 */
final class Snapshot extends ApiClient
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
     * Get snapshot info
     *
     * @param   string $company Company
     * @param   string $username Username
     * @param   string $ts Timestamp
     * @return  object
     */
    public function get($company, $username, $ts)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/team/v1/snapshots/' . $company . '/' . $username . '/' . $ts);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Update snapshot
     *
     * @param   string $company Company
     * @param   string $username Username
     * @param   string $ts Timestamp
     * @param   array $params Parameters
     * @return  object
     */
    public function update($company, $username, $ts, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/team/v1/snapshots/' . $company . '/' . $username . '/' . $ts, $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Delete snapshot
     *
     * @param   string $company Company
     * @param   string $username Username
     * @param   string $ts Timestamp
     * @return  object
     */
    public function delete($company, $username, $ts)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/team/v1/snapshots/' . $company . '/' . $username . '/' . $ts);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
