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

namespace oDesk\API\Interfaces;

/**
 * Client Interface for AuthTypes
 */
interface Client
{
    /**
     * Authentication
     *
     * @access  public
     */
    public function auth();

    /**
     * Request to API server
     *
     * @param   string $type Type of request, i.e. http method
     * @param   string $url URL
     * @param   array $params (Optional) List of additional parameters
     * @access  public
     */
    public function request($type, $url, $params = array());

    /**
     * Request token from server, i.e. setup it on server and return to client
     *
     * @access  public
     */
    public function setupRequestToken();
}
