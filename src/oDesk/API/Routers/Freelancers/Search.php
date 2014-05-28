<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Search Freelancers
 *
 * @final
 * @package     oDeskAPI
 * @since       05/16/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link http://developers.odesk.com/API-Terms-of-Use}
 */

namespace oDesk\API\Routers\Freelancers;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * Search Freelancers
 *
 * @link http://developers.odesk.com/search-providers
 */
final class Search extends ApiClient
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
     * Search freelancers
     *
     * @param   array $params (Optional) Parameters
     * @return  object
     */
    public function find($params = array())
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/profiles/v2/search/providers', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
