<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Get oTask/Activity records for specific user
 *
 * @final
 * @package     oDeskAPI
 * @since       05/21/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link http://developers.odesk.com/API-Terms-of-Use}
 */

namespace oDesk\API\Routers\Activities;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * Get an oTask/Activity records for specific user
 *
 * @link http://developers.odesk.com/oTasks-API
 */
final class User extends ApiClient
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
     * Get by type
     *
     * @param   string $company Company ID
     * @param   string $team Team ID
     * @param   string $username User ID
     * @param   string $code (Optional) Code(s)
     * @param   boolean $isFull (Optional) Full list option
     * @return  object
     */
    private function _getByType($company, $team, $username, $code = null, $isFull = false)
    {
        ApiDebug::p(__FUNCTION__);

        $_url = '';
        if ($isFull) {
            $_url = '/full_list';
        } elseif (!empty($code)) {
            $_url = '/' . $code;
        }

        $response = $this->_client->get('/otask/v1/tasks/companies/' . $company . '/teams/' . $team . '/users/' . $username . '/tasks' . $_url);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * List all oTask/Activity records for a specific user
     *
     * @param   string $company Company ID
     * @param   string $team Team ID
     * @param   string $username User ID
     * @return  object
     */
    public function getList($company, $team, $username)
    {
        ApiDebug::p(__FUNCTION__);

        return $this->_getByType($company, $team, $username);
    }

    /**
     * List all oTask/Activity records for a specific user
     *
     * @param   string $company Company ID
     * @param   string $team Team ID
     * @param   string $username User ID
     * @return  object
     */
    public function getFullList($company, $team, $username)
    {
        ApiDebug::p(__FUNCTION__);

        return $this->_getByType($company, $team, $username, null, true);
    }

    /**
     * List all oTask/Activity records for a specific user by specified code(s)
     *
     * @param   string $company Company ID
     * @param   string $team Team ID
     * @param   string $username User ID
     * @param   string $code Specific code(s)
     * @return  object
     */
    public function getSpecificList($company, $team, $username, $code)
    {
        ApiDebug::p(__FUNCTION__);

        return $this->_getByType($company, $team, $username, $code);
    }

    /**
     * Create an oTask/Activity record for a specific user
     *
     * @param   string $company Company ID
     * @param   string $team Team ID
     * @param   string $username User ID
     * @param   string $params Parameters
     * @return  object
     */
    public function addActivity($company, $team, $username, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->post('/otask/v1/tasks/companies/' . $company . '/teams/' . $team . '/users/' . $username . '/tasks', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Update specific oTask/Activity record for a specific user
     *
     * @param   string $company Company ID
     * @param   string $team Team ID
     * @param   string $username User ID
     * @param   string $code Specific code
     * @param   string $params Parameters
     * @return  object
     */
    public function updateActivity($company, $team, $username, $code, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->put('/otask/v1/tasks/companies/' . $company . '/teams/' . $team . '/users/' . $username . '/tasks/' . $code, $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Delete specific oTask/Activity record for a specific user
     *
     * @param   string $company Company ID
     * @param   string $team Team ID
     * @param   string $username User ID
     * @param   string $code Specific code(s)
     * @return  object
     */
    public function deleteActivities($company, $team, $username, $code)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->delete('/otask/v1/tasks/companies/' . $company . '/teams/' . $team . '/users/' . $username . '/tasks/' . $code);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Delete all oTask/Activity records for a specific user
     *
     * @param   string $company Company ID
     * @param   string $team Team ID
     * @param   string $username User ID
     * @return  object
     */
    public function deleteAllactivities($company, $team, $username)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->delete('/otask/v1/tasks/companies/' . $company . '/teams/' . $team . '/users/' . $username . '/tasks/all_tasks');
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
