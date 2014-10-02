<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Freelancer's Offers
 *
 * @final
 * @package     oDeskAPI
 * @since       05/09/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link https://developers.odesk.com/api-tos.html}
 */

namespace oDesk\API\Routers\Hr\Freelancers;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * Freelancer Job Offers API
 *
 * @link http://developers.odesk.com/w/page/70448095/Contractor%20Offers
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

        $response = $this->_client->get('/offers/v1/contractors/offers', $params);
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

        $response = $this->_client->get('/offers/v1/contractors/offers/' . $reference);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
