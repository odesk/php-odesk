<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Custom Payments
 *
 * @final
 * @package     oDeskAPI
 * @since       05/02/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link https://developers.odesk.com/api-tos.html}
 */

namespace oDesk\API\Routers;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * Custom Payments
 *
 * @link http://developers.odesk.com/Custom-Payment-API
 */
final class Payments extends ApiClient
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
     * Submit a Custom Payment
     *
     * @param   integer $teamReference Team reference
     * @param   array $params Parameters
     * @return  object
     */
    public function submitBonus($teamReference, $params)
    {
        ApiDebug::p(__FUNCTION__);

        $adjustments = $this->_client->post('/hr/v2/teams/' . $teamReference . '/adjustments', $params);
        ApiDebug::p('found adjustments info', $adjustments);

        return $adjustments;
    }
}
