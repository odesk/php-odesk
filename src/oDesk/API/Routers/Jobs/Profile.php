<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Job Profile
 *
 * @final
 * @package     oDeskAPI
 * @since       05/15/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link https://developers.odesk.com/api-tos.html}
 */

namespace oDesk\API\Routers\Jobs;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * Job Profile
 *
 * @link http://developers.odesk.com/w/page/49065901/Job%20Profile
 */
final class Profile extends ApiClient
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
     * Get specific Job Profile
     *
     * @param   string $key Profile key
     * @return  object
     */
    public function getSpecific($key)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/profiles/v1/jobs/' . $key);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
