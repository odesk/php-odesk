<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Financial Reporting
 *
 * @final
 * @package     oDeskAPI
 * @since       05/02/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link https://developers.odesk.com/api-tos.html}
 */

namespace oDesk\API\Routers\Reports\Finance;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * Financial Reporting
 *
 * @link http://developers.odesk.com/Financial-Reports-GDS-API
 */
final class Accounts extends ApiClient
{
    const ENTRY_POINT = ODESK_GDS_EP_NAME;

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
     * Generate Financial Reports for an owned Account
     *
     * @param   integer $freelancerReference Freelancer reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getOwned($freelancerReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/financial_account_owner/' . $freelancerReference, $params);
        ApiDebug::p('found report info', $report);

        return $report;
    }

    /**
     * Generate Financial Reports for a Specific Account
     *
     * @param   integer $entityReference Entity reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getSpecific($entityReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/financial_accounts/' . $entityReference, $params);
        ApiDebug::p('found auth info', $report);

        return $report;
    }
}
