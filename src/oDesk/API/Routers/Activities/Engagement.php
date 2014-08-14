<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Get oTask/Activity records by contract/engagement
 *
 * @final
 * @package     oDeskAPI
 * @since       08/04/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link http://developers.odesk.com/API-Terms-of-Use}
 */

namespace oDesk\API\Routers\Activities;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * Get an Activity records by contract/engagement
 *
 * @link http://developers.odesk.com/oTasks-API
 */
final class Engagement extends ApiClient
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
     * List activities for specific engagement
     *
     * @param   integer $engagement_ref Engagement reference
     * @return  object
     */
    public function getSpecific($engagement_ref)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/tasks/v2/tasks/contracts/' . $engagement_ref);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Assign engagements to the list of activities
     *
     * @param   string  $company 
     * @param   integer $engagement Engagement
     * @return  object
     */
    public function assign($company, $team, $engagement, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->put('/otask/v2/tasks/companies/' .$company . '/teams/' . $team . '/engagements/' . $engagement . '/tasks', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
