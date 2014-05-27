<?php
namespace oDesk\API\Tests;

require __DIR__ . '/../../../vendor/autoload.php';

use oDesk\API\ApiException as ApiException;

class ApiExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException oDesk\API\ApiException
     */
    public function testException()
    {
        throw new ApiException('test');
    }
}
