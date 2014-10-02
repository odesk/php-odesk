<?php
/**
 * oDesk auth library for using with public API by OAuth
 *
 * @final
 * @package     oDeskAPI
 * @since       04/21/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link https://developers.odesk.com/api-tos.html}
 */

namespace oDesk\API;

use oDesk\API\Debug as ApiDebug;

/**
 * Utils
 */
final class Utils
{
    /**
     * Get full url, based on global constant
     *
     * @param	string $url Relative URL
     * @param	string $ep (Optional) Entry point
     * @static
     * @access	public
     * @return	string
     */
    static public function getFullUrl($url, $ep = null)
    {
        ApiDebug::p('create full url, based on global constant');

        $name = ($ep)
            ? 'ODESK_BASE_URL_' . strtoupper($ep)
            : 'ODESK_BASE_URL';

        $fullUrl = constant($name) . $url;
        ApiDebug::p('url', $fullUrl);

        return $fullUrl;
    }
}
