<?php
/**
 * oDesk auth library for using with public API by OAuth
 *
 * @final
 * @package     oDeskAPI
 * @since       04/21/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link http://developers.odesk.com/API-Terms-of-Use}
 */

namespace oDesk\API\Routers;

use oDesk\API\Debug as ApiDebug;
use oDesk\API\Client as ApiClient;

/**
 * Message Center
 *
 * @link http://developers.odesk.com/Message-Center-API
 */
final class Mc extends ApiClient
{
    const ENTRY_POINT = 'api';

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
        ApiDebug::p('init mc router');
        $this->_client = $client;
        parent::$_epoint = self::ENTRY_POINT;
    }

    /**
     * Get trays
     *
     * @access  public
     * @return  object
     */
    public function getTrays()
    {
        ApiDebug::p('getTrays');

        $response = $this->_client->get('/mc/v1/trays');
        ApiDebug::p('found trays', $response);

        return $response;
    }

    /**
     * Send new message
     *
     * @param   string $username User ID
     * @param   array $params Parameters
     * @access  public
     * @return  object
     */
    public function startNewThread($username, $params)
    {
        ApiDebug::p('startNewThread');

        $response = $this->_client->post('/mc/v1/threads/' . $username, $params);
        ApiDebug::p('found response', $response);

        return $response;
    }

    /**
     * Reply to existend thread
     *
     * @param   string $username User ID
     * @param   integer $threadId Thread ID
     * @param   array $params Parameters
     * @access  public
     * @return  object
     */
    public function replyToThread($username, $threadId, $params)
    {
        ApiDebug::p('replyToThread');

        $response = $this->_client->post('/mc/v1/threads/' . $username . '/' . $threadId, $params);
        ApiDebug::p('found response', $response);
        
        return $response;
    }
}
