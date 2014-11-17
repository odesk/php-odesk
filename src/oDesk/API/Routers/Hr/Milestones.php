<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Work with Milestones
 *
 * @final
 * @package     oDeskAPI
 * @since       11/17/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link https://developers.odesk.com/api-tos.html}
 */

namespace oDesk\API\Routers\Hr;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * Milestones
 *
 * @link https://developers.odesk.com/?lang=php#contracts-and-offers
 */
final class Milestones extends ApiClient
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
     * Create a new Milestone
     *
     * @param   array $params Parameters
     * @return  object
     */
    public function create($params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->post('/hr/v3/fp/milestones', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Edit an existing Milestone
     *
     * @param   integer Milestone ID
     * @param   array $params Parameters
     * @return  object
     */
    public function edit($milestoneId, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->put('/hr/v3/fp/milestones/' . $milestoneId, $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Activate an existing Milestone
     *
     * @param   integer Milestone ID
     * @param   array $params Parameters
     * @return  object
     */
    public function activate($milestoneId, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->put('/hr/v3/fp/milestones/' . $milestoneId . '/activate', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Approve an existing Milestone
     *
     * @param   integer Milestone ID
     * @param   array $params Parameters
     * @return  object
     */
    public function approve($milestoneId, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->put('/hr/v3/fp/milestones/' . $milestoneId . '/approve', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Delete an existing Milestone
     *
     * @param   integer Milestone ID
     * @return  object
     */
    public function delete($milestoneId)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->delete('/hr/v3/fp/milestones/' . $milestoneId);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}
