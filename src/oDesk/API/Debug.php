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

namespace oDesk\API;

use oDesk\API\Config as ApiConfig;

/**
 * Debug class
 */
class Debug
{
    /**
     * @var Debug status
     */
    static private $_debug = false;

    /**
     * Print debug message
     *
     * @param   string $str Debug message
     * @param   array $args (Optional) Value to dump
     * @static
     * @access  public
     * @return  void
     */
    public static function p($str, $args = false)
    {
        if (self::$_debug === true || ApiConfig::get('debug') === true) {
            // first call
            if (self::$_debug === false) {
                self::$_debug = true;
            }

            if ($args !== false) {
                $str .= ', dump: ' . var_export($args, true);
            }

            $str .= ".\n";

            print_r('> ' . $str);
        }
    }
}
