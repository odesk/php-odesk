<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Client's Offers
 *
 * @final
 * @package     oDeskAPI
 * @since       05/09/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link http://developers.odesk.com/API-Terms-of-Use}
 */

namespace oDesk\API\Routers\Hr\Clients;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * Client Job Offers API
 *
 * @link http://developers.odesk.com/w/page/70447610/Client%20Offers
 */
final class Offers extends ApiClient
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
     * Get list of offers
     *
     * @param   array $params Parameters
     * @return  object
     */
    public function getList($params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/offers/v1/clients/offers', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Get specific offer
     *
     * @param   integer $reference Offer reference
     * @return  object
     */
    public function getSpecific($reference)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/offers/v1/clients/offers/' . $reference);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Send offer
     *
     * @param   array $params Parameters
     * @return  object
     */
    public function makeOffer($params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->post('/offers/v1/clients/offers', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
