<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Freelancer Profile
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
 * Freelancer Profile
 *
 * @link http://developers.odesk.com/Freelancer-Profile
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
     * Get specific Freelancer Profile
     *
     * @param   string $key Profile key
     * @return  object
     */
    public function getSpecific($key)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/profiles/v1/providers/' . $key);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
