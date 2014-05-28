<?php
namespace oDesk\API\Tests\Routers\Jobs;

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
        $router = new \oDesk\API\Routers\Jobs\Search($this->_client);
        $response = $router->find(array());
        
        $this->_checkResponse($response);
    }
}
