<?php
require __DIR__ . '/../../../vendor/autoload.php';

use oDesk\API\Config as Apiconfig;
use oDesk\API\Debug as ApiDebug;
use oDesk\API\Utils as Utils;

class UtilsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testGetFullUrl()
    {
        $url = Utils::getFullUrl('/auth/v1/oauth/token/access', 'api');
        $this->assertEquals('https://www.odesk.com/api/auth/v1/oauth/token/access', $url);
    }
}
