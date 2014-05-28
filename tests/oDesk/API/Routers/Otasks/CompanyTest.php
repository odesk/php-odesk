<?php
namespace oDesk\API\Tests\Routers\Otasks;

use oDesk\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class CompanyTest extends CommonTestRouter
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
        $router = new \oDesk\API\Routers\Otasks\Company($this->_client);
        $response = $router->getList('company');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetFullList()
    {
        $router = new \oDesk\API\Routers\Otasks\Company($this->_client);
        $response = $router->getFullList('company');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetSpecificList()
    {
        $router = new \oDesk\API\Routers\Otasks\Company($this->_client);
        $response = $router->getSpecificList('company', 'code');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testAddTask()
    {
        $router = new \oDesk\API\Routers\Otasks\Company($this->_client);
        $response = $router->addTask('company', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testUpdateTask()
    {
        $router = new \oDesk\API\Routers\Otasks\Company($this->_client);
        $response = $router->updateTask('company', 'code', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testUpdateBatch()
    {
        $router = new \oDesk\API\Routers\Otasks\Company($this->_client);
        $response = $router->updateBatch('company', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testDeleteTasks()
    {
        $router = new \oDesk\API\Routers\Otasks\Company($this->_client);
        $response = $router->deleteTasks('company', 'code');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testDeleteAllTasks()
    {
        $router = new \oDesk\API\Routers\Otasks\Company($this->_client);
        $response = $router->deleteAllTasks('company');
        
        $this->_checkResponse($response);
    }
}
