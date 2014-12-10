<?php
namespace oDesk\API\Tests\Routers\Hr;

use oDesk\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class SubmissionsTest extends CommonTestRouter
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
    public function testRequestApproval()
    {
        $router = new \oDesk\API\Routers\Hr\Submissions($this->_client);
        $response = $router->requestApproval(array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testApprove()
    {
        $router = new \oDesk\API\Routers\Hr\Submissions($this->_client);
        $response = $router->approve('1234', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testReject()
    {
        $router = new \oDesk\API\Routers\Hr\Submissions($this->_client);
        $response = $router->reject('1234', array());
        
        $this->_checkResponse($response);
    }
}
