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
final class Earnings extends ApiClient
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
     * Generate Earning Reports for a Specific Freelancer
     *
     * @param   integer $freelancerReference Freelancer reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getByFreelancer($freelancerReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/providers/' . $freelancerReference . '/earnings', $params);
        ApiDebug::p('found report info', $report);

        return $report;
    }

    /**
     * Generate Earning Reports for a Specific Freelancer's Team
     *
     * @param   integer $freelancerTeamReference Freelancer team reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getByFreelancersTeam($freelancerTeamReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/provider_teams/' . $freelancerTeamReference . '/earnings', $params);
        ApiDebug::p('found report info', $report);

        return $report;
    }

    /**
     * Generate Earning Reports for a Specific Freelancer's Company
     *
     * @param   integer $freelancerCompanyReference Freelancer company reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getByFreelancersCompany($freelancerCompanyReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/provider_companies/' . $freelancerCompanyReference . '/earnings', $params);
        ApiDebug::p('found report info', $report);

        return $report;
    }

    /**
     * Generate Earning Reports for a Specific Buyer's Team
     *
     * @param   integer $buyerTeamReference Buyer team reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getByBuyersTeam($buyerTeamReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/buyer_teams/' . $buyerTeamReference . '/earnings', $params);
        ApiDebug::p('found report info', $report);

        return $report;
    }

    /**
     * Generate Earning Reports for a Specific Buyer's Company
     *
     * @param   integer $buyerCompanyReference Buyer company reference
     * @param   array $params Parameters
     * @return  object
     */
    public function getByBuyersCompany($buyerCompanyReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $report = $this->_client->get('/finreports/v2/buyer_companies/' . $buyerCompanyReference . '/earnings', $params);
        ApiDebug::p('found report info', $report);

        return $report;
    }
}
