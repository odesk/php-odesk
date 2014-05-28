<?php
namespace oDesk\API\Tests\Routers\Organization;

use oDesk\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class TeamsTest extends CommonTestRouter
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
    public function testList()
    {
        $router = new \oDesk\API\Routers\Organization\Teams($this->_client);
        $response = $router->getList();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetUsersInTeam()
    {
        $router = new \oDesk\API\Routers\Organization\Teams($this->_client);
        $response = $router->getUsersInTeam('12345');
        
        $this->_checkResponse($response);
    }
}
