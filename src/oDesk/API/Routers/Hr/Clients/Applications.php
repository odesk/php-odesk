<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Client's Applications
 *
 * @final
 * @package     oDeskAPI
 * @since       05/09/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link https://developers.odesk.com/api-tos.html}
 */

namespace oDesk\API\Routers\Hr\Clients;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * Client Job Applications API
 *
 * @link http://developers.odesk.com/w/page/75436187/Client%20Job%20Applications
 */
final class Applications extends ApiClient
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
     * Get list of applications
     *
     * @param   array $params Parameters
     * @return  object
     */
    public function getList($params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/hr/v3/clients/applications', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Get specific application
     *
     * @param   integer $reference Application reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getSpecific($reference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/hr/v3/clients/applications/' . $reference, $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
