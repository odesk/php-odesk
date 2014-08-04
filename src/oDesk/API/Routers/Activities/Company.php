<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Get oTask/Activity records within a company
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
 * Get an Activity records within a company
 *
 * @link http://developers.odesk.com/oTasks-API
 */
final class Company extends ApiClient
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
     * @param   string $code (Optional) Code(s)
     * @param   boolean $isFull (Optional) Full list option
     * @return  object
     */
    private function _getByType($company, $code = null, $isFull = false)
    {
        ApiDebug::p(__FUNCTION__);

        $_url = '';
        if ($isFull) {
            $_url = '/full_list';
        } elseif (!empty($code)) {
            $_url = '/' . $code;
        }

        $response = $this->_client->get('/otask/v1/tasks/companies/' . $company . '/tasks' . $_url);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * List all oTask/Activity records within a Company
     *
     * @param   string $company Company ID
     * @return  object
     */
    public function getList($company)
    {
        ApiDebug::p(__FUNCTION__);

        return $this->_getByType($company);
    }

    /**
     * List all oTask/Activity records within a Company with additional info
     *
     * @param   string $company Company ID
     * @return  object
     */
    public function getFullList($company)
    {
        ApiDebug::p(__FUNCTION__);

        return $this->_getByType($company, null, true);
    }

    /**
     * List all oTask/Activity records within a Company by specified code(s)
     *
     * @param   string $company Company ID
     * @param   string $code Specific code(s)
     * @return  object
     */
    public function getSpecificList($company, $code)
    {
        ApiDebug::p(__FUNCTION__);

        return $this->_getByType($company, $code);
    }

    /**
     * Create an oTask/Activity record within a company
     *
     * @param   string $company Company ID
     * @param   params $params Parameters
     * @return  object
     */
    public function addActivity($company, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->post('/otask/v1/tasks/companies/' . $company . '/tasks', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Update specific oTask/Activity record within a company
     *
     * @param   string $company Company ID
     * @param   string $code Specific code
     * @param   array $params Parameters
     * @return  object
     */
    public function updateActivity($company, $code, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->put('/otask/v1/tasks/companies/' . $company . '/tasks/' . $code, $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Update a group of oTask/Activity records within a company
     *
     * @param   string $company Company ID
     * @param   array $params Parameters
     * @return  object
     */
    public function updateBatch($company, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->put('/otask/v1/tasks/companies/' . $company . '/tasks/batch', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Delete specific oTask/Activity record within a company
     *
     * @param   string $company Company ID
     * @param   string $code Specific code(s)
     * @return  object
     */
    public function deleteActivities($company, $code)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->delete('/otask/v1/tasks/companies/' . $company . '/tasks/' . $code);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Delete all oTask/Activity records within a company
     *
     * @param   string $company Company ID
     * @return  object
     */
    public function deleteAllActivities($company)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->delete('/otask/v1/tasks/companies/' . $company . '/tasks/all_tasks');
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
