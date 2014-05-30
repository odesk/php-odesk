<?php
namespace oDesk\API\Tests\Routers\Activities;

use oDesk\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class UserTest extends CommonTestRouter
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
        $router = new \oDesk\API\Routers\Activities\User($this->_client);
        $response = $router->getList('company', 'team', 'username');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetFullList()
    {
        $router = new \oDesk\API\Routers\Activities\User($this->_client);
        $response = $router->getFullList('company', 'team', 'username');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetSpecificList()
    {
        $router = new \oDesk\API\Routers\Activities\User($this->_client);
        $response = $router->getSpecificList('company', 'team', 'username', 'code');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testAddActivity()
    {
        $router = new \oDesk\API\Routers\Activities\User($this->_client);
        $response = $router->addActivity('company', 'team', 'username', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testUpdateActivity()
    {
        $router = new \oDesk\API\Routers\Activities\User($this->_client);
        $response = $router->updateActivity('company', 'team', 'username', 'code', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testDeleteActivities()
    {
        $router = new \oDesk\API\Routers\Activities\User($this->_client);
        $response = $router->deleteActivities('company', 'team', 'username', 'code');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testDeleteAllActivities()
    {
        $router = new \oDesk\API\Routers\Activities\User($this->_client);
        $response = $router->deleteAllactivities('company', 'team', 'username');
        
        $this->_checkResponse($response);
    }
}
