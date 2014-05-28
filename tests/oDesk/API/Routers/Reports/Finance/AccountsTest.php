<?php
namespace oDesk\API\Tests\Routers\Reports\Finance;

use oDesk\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../../CommonTestRouter.php';

class AccountsTest extends CommonTestRouter
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
    public function testGetOwned()
    {
        $router = new \oDesk\API\Routers\Reports\Finance\Accounts($this->_client);
        $response = $router->getOwned('12345', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetSpecific()
    {
        $router = new \oDesk\API\Routers\Reports\Finance\Accounts($this->_client);
        $response = $router->getSpecific('12345', array());
        
        $this->_checkResponse($response);
    }
}
