<?php
namespace oDesk\API\Tests\Routers\Otasks;

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
        $router = new \oDesk\API\Routers\Otasks\Team($this->_client);
        $response = $router->getList('company', 'team');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetFullList()
    {
        $router = new \oDesk\API\Routers\Otasks\Team($this->_client);
        $response = $router->getFullList('company', 'team');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetSpecificList()
    {
        $router = new \oDesk\API\Routers\Otasks\Team($this->_client);
        $response = $router->getSpecificList('company', 'team', 'code');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testAddTask()
    {
        $router = new \oDesk\API\Routers\Otasks\Team($this->_client);
        $response = $router->addTask('company', 'team', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testUpdateTask()
    {
        $router = new \oDesk\API\Routers\Otasks\Team($this->_client);
        $response = $router->updateTask('company', 'team', 'code', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testDeleteTasks()
    {
        $router = new \oDesk\API\Routers\Otasks\Team($this->_client);
        $response = $router->deleteTasks('company', 'team', 'code');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testDeleteAllTasks()
    {
        $router = new \oDesk\API\Routers\Otasks\Team($this->_client);
        $response = $router->deleteAllTasks('company', 'team');
        
        $this->_checkResponse($response);
    }
}
