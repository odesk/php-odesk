<?php
namespace oDesk\API\Tests\Routers\Activities;

use oDesk\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class TeamTest extends CommonTestRouter
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
        $router = new \oDesk\API\Routers\Activities\Team($this->_client);
        $response = $router->getList('company', 'team');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetSpecificList()
    {
        $router = new \oDesk\API\Routers\Activities\Team($this->_client);
        $response = $router->getSpecificList('company', 'team', 'code');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testAddActivity()
    {
        $router = new \oDesk\API\Routers\Activities\Team($this->_client);
        $response = $router->addActivity('company', 'team', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testUpdateActivity()
    {
        $router = new \oDesk\API\Routers\Activities\Team($this->_client);
        $response = $router->updateActivity('company', 'team', 'code', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testArchiveActivities()
    {
        $router = new \oDesk\API\Routers\Activities\Team($this->_client);
        $response = $router->archiveActivities('company', 'team', 'code');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testUnarchiveActivities()
    {
        $router = new \oDesk\API\Routers\Activities\Team($this->_client);
        $response = $router->UnarchiveActivities('company', 'team', 'code');
        
        $this->_checkResponse($response);
    }
}
