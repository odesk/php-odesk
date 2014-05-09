<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Invite to Interview
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
 * Invite to Interview
 *
 * @link http://developers.odesk.com/w/page/23873221/Jobs%20HR%20API
 */
final class Interviews extends ApiClient
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
     * Invite to Interview
     *
     * @param   string $jobKey Job key
     * @param   array $params Parameters
     * @return  object
     */
    public function invite($jobKey, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->post('/hr/v1/jobs/' . $jobKey . '/candidates', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
