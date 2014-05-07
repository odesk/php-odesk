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
 * @license     oDesk's API Terms of Use {@link http://developers.odesk.com/API-Terms-of-Use}
 */

namespace oDesk\API\Routers\Reports\Finance;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * Financial Reporting
 *
 * @link http://developers.odesk.com/Financial-Reports-GDS-API
 */
final class Billings extends ApiClient
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
     * Generate Billing Reports for a Specific Provider
     *
     * @param   integer $providerReference Provider reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getByProvider($providerReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/providers/' . $providerReference . '/billings', $params);
        ApiDebug::p('found report info', $report);

        return $report;
    }

    /**
     * Generate Billing Reports for a Specific Provider's Team
     *
     * @param   integer $providerTeamReference Provider team reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getByProvidersTeam($providerTeamReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/provider_teams/' . $providerTeamReference . '/billings', $params);
        ApiDebug::p('found report info', $report);

        return $report;
    }

    /**
     * Generate Billing Reports for a Specific Provider's Company
     *
     * @param   integer $providerCompanyReference Provider company reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getByProvidersCompany($providerCompanyReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/provider_companies/' . $providerCompanyReference . '/billings', $params);
        ApiDebug::p('found report info', $report);

        return $report;
    }

    /**
     * Generate Billing Reports for a Specific Buyer's Team
     *
     * @param   integer $buyerTeamReference Buyer team reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getByBuyersTeam($buyerTeamReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/buyer_teams/' . $buyerTeamReference . '/billings', $params);
        ApiDebug::p('found report info', $report);

        return $report;
    }

    /**
     * Generate Billing Reports for a Specific Buyer's Company
     *
     * @param   integer $buyerCompanyReference Buyer company reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getByBuyersCompany($buyerCompanyReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/buyer_companies/' . $buyerCompanyReference . '/billings', $params);
        ApiDebug::p('found report info', $report);

        return $report;
    }
}
