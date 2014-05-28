<?php
namespace oDesk\API\Tests\Routers\Hr;

use oDesk\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class JobsTest extends CommonTestRouter
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
    public function testGetList()
    {
        $router = new \oDesk\API\Routers\Hr\Jobs($this->_client);
        $response = $router->getList(array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetSpecific()
    {
        $router = new \oDesk\API\Routers\Hr\Jobs($this->_client);
        $response = $router->getSpecific('~jobkey');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testPostJob()
    {
        $router = new \oDesk\API\Routers\Hr\Jobs($this->_client);
        $response = $router->postJob(array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testEditJob()
    {
        $router = new \oDesk\API\Routers\Hr\Jobs($this->_client);
        $response = $router->editJob('~jobkey', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testDeleteJob()
    {
        $router = new \oDesk\API\Routers\Hr\Jobs($this->_client);
        $response = $router->deleteJob('~jobkey', array());
        
        $this->_checkResponse($response);
    }
}
