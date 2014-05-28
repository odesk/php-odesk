<?php
namespace oDesk\API\Tests\Routers\Organization;

use oDesk\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class UsersTest extends CommonTestRouter
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
    public function testGetMyInfo()
    {
        $router = new \oDesk\API\Routers\Organization\Users($this->_client);
        $response = $router->getMyInfo();
        
        $this->_checkResponse($response);
    }
}
