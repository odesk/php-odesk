<?php
namespace oDesk\API\Tests\Routers\Hr;

use oDesk\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class ContractsTest extends CommonTestRouter
{
    /**
     * Setup
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function testEndContract()
    {
        $router = new \oDesk\API\Routers\Hr\Contracts($this->_client);
        $response = $router->endContract('11111', array());
        
        $this->_checkResponse($response);
    }
}
