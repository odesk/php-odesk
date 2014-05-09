<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Contracts
 *
 * @final
 * @package     oDeskAPI
 * @since       05/09/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link http://developers.odesk.com/API-Terms-of-Use}
 */

namespace oDesk\API\Routers\Hr;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * Contracts API
 *
 * @link http://developers.odesk.com/w/page/46842954/Contracts%20API
 */
final class Contracts extends ApiClient
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
     * End Contract
     *
     * @param   integer $reference Contract reference
     * @param   array $params Parameters
     * @return  object
     */
    public function endContract($reference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->delete('/hr/v2/contracts/' . $reference, $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
