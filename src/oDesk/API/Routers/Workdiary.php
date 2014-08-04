<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Workdiary API
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
 * Workdiary API
 *
 * @link http://developers.odesk.com/Work-Diary
 */
final class Workdiary extends ApiClient
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
     * Get Workdiary
     *
     * @param   string $company Company ID
     * @param   string $username User ID
     * @param   string $date Date
     * @param   array $params (Optional) Parameters
     * @return  object
     */
    public function get($company, $username, $date, $params = array())
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/team/v1/workdiaries/' . $company . '/' . $username . '/' . $date, $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
