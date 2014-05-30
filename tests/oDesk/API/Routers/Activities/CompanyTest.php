<?php
namespace oDesk\API\Tests\Routers\Activities;

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
        $router = new \oDesk\API\Routers\Activities\Company($this->_client);
        $response = $router->getList('company');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetFullList()
    {
        $router = new \oDesk\API\Routers\Activities\Company($this->_client);
        $response = $router->getFullList('company');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetSpecificList()
    {
        $router = new \oDesk\API\Routers\Activities\Company($this->_client);
        $response = $router->getSpecificList('company', 'code');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testAddActivity()
    {
        $router = new \oDesk\API\Routers\Activities\Company($this->_client);
        $response = $router->addActivity('company', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testUpdateActivity()
    {
        $router = new \oDesk\API\Routers\Activities\Company($this->_client);
        $response = $router->updateActivity('company', 'code', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testUpdateBatch()
    {
        $router = new \oDesk\API\Routers\Activities\Company($this->_client);
        $response = $router->updateBatch('company', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testDeleteActivities()
    {
        $router = new \oDesk\API\Routers\Activities\Company($this->_client);
        $response = $router->deleteActivities('company', 'code');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testDeleteAllActivities()
    {
        $router = new \oDesk\API\Routers\Activities\Company($this->_client);
        $response = $router->deleteAllActivities('company');
        
        $this->_checkResponse($response);
    }
}
