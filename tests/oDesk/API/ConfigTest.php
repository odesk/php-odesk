<?php
require __DIR__ . '/../../../vendor/autoload.php';

use oDesk\API\Config as Config;
use oDesk\API\ApiException as ApiException;

class ConfigTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException oDesk\API\ApiException
     */
    public function testBadProperty()
    {
        throw new ApiException('test');
    }

    /**
     * @test
     */
    public function testDefaultProperty()
    {
        $reflection = new ReflectionClass('oDesk\API\Config');
        $property = $reflection->getProperty('_verifySsl');
        $property->setAccessible(true);
        $helper = new Config(array());
        $property->setValue($helper, true);
        $helper->__construct(array()); // will not change the attribute value
        $this->assertAttributeEquals(true, '_verifySsl', $helper);
    }

    /**
     * @test
     */
    public function testSetProperty()
    {
        $reflection = new ReflectionClass('oDesk\API\Config');
        $property = $reflection->getProperty('_verifySsl');
        $property->setAccessible(true);
        $helper = new Config(array());
        $property->setValue($helper, false);
        $helper->__construct(array('verifySsl' => true));
        $this->assertAttributeEquals(true, '_verifySsl', $helper);
    }

    /**
     * @test
     */
    public function testGetProperty()
    {
        $config = new Config(array('verifySsl' => false));
        $property = $config::get('verifySsl');
        $this->assertFalse($property);
    }
}
