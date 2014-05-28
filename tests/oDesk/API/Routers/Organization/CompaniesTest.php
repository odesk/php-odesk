<?php
namespace oDesk\API\Tests\Routers\Organization;

use oDesk\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class CompaniesTest extends CommonTestRouter
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
        $router = new \oDesk\API\Routers\Organization\Companies($this->_client);
        $response = $router->getList();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetSpecific()
    {
        $router = new \oDesk\API\Routers\Organization\Companies($this->_client);
        $response = $router->getSpecific('12345');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetTeams()
    {
        $router = new \oDesk\API\Routers\Organization\Companies($this->_client);
        $response = $router->getTeams('12345');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testUsers()
    {
        $router = new \oDesk\API\Routers\Organization\Companies($this->_client);
        $response = $router->getUsers('12345');
        
        $this->_checkResponse($response);
    }
}
