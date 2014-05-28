<?php
namespace oDesk\API\Tests\Routers\Hr;

use oDesk\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class InterviewsTest extends CommonTestRouter
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
    public function testInvite()
    {
        $router = new \oDesk\API\Routers\Hr\Interviews($this->_client);
        $response = $router->invite('~jobkey', array());
        
        $this->_checkResponse($response);
    }
}
