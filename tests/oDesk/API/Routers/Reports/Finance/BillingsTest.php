<?php
namespace oDesk\API\Tests\Routers\Reports\Finance;

use oDesk\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../../CommonTestRouter.php';

class BillingsTest extends CommonTestRouter
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
    public function testGetByFreelancer()
    {
        $router = new \oDesk\API\Routers\Reports\Finance\Billings($this->_client);
        $response = $router->getByFreelancer('12345', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByFreelancersTeam()
    {
        $router = new \oDesk\API\Routers\Reports\Finance\Billings($this->_client);
        $response = $router->getByFreelancersTeam('12345', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByFreelancersCompany()
    {
        $router = new \oDesk\API\Routers\Reports\Finance\Billings($this->_client);
        $response = $router->getByFreelancersCompany('12345', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByBuyersTeam()
    {
        $router = new \oDesk\API\Routers\Reports\Finance\Billings($this->_client);
        $response = $router->getByBuyersTeam('12345', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByBuyersCompany()
    {
        $router = new \oDesk\API\Routers\Reports\Finance\Billings($this->_client);
        $response = $router->getByBuyersCompany('12345', array());
        
        $this->_checkResponse($response);
    }
}
