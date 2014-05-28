<?php
namespace oDesk\API\Tests\Routers\Freelancers;

use oDesk\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class SearchTest extends CommonTestRouter
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
    public function testFind()
    {
        $router = new \oDesk\API\Routers\Freelancers\Search($this->_client);
        $response = $router->find(array());
        
        $this->_checkResponse($response);
    }
}
