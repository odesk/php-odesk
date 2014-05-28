<?php
namespace oDesk\API\Tests\Routers\Hr;

use oDesk\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class RolesTest extends CommonTestRouter
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
    public function testGetAll()
    {
        $router = new \oDesk\API\Routers\Hr\Roles($this->_client);
        $response = $router->getAll();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetBySpecificUser()
    {
        $router = new \oDesk\API\Routers\Hr\Roles($this->_client);
        $response = $router->getBySpecificUser('12345');
        
        $this->_checkResponse($response);
    }
}
