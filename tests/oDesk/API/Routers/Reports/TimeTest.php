<?php
namespace oDesk\API\Tests\Routers\Reports;

use oDesk\API\Tests\Routers\CommonTestRouter;

require_once __DIR__  . '/../CommonTestRouter.php';

class TimeTest extends CommonTestRouter
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
    public function testGetByTeamFull()
    {
        $router = new \oDesk\API\Routers\Reports\Time($this->_client);
        $response = $router->getByTeamFull('company', 'team', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByTeamLimited()
    {
        $router = new \oDesk\API\Routers\Reports\Time($this->_client);
        $response = $router->getByTeamLimited('company', 'team', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByAgency()
    {
        $router = new \oDesk\API\Routers\Reports\Time($this->_client);
        $response = $router->getByAgency('company', 'agency', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByCompany()
    {
        $router = new \oDesk\API\Routers\Reports\Time($this->_client);
        $response = $router->getByCompany('company', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByFreelancerLimited()
    {
        $router = new \oDesk\API\Routers\Reports\Time($this->_client);
        $response = $router->getByFreelancerLimited('provider', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetByFreelancerFull()
    {
        $router = new \oDesk\API\Routers\Reports\Time($this->_client);
        $response = $router->getByFreelancerFull('provider', array());
        
        $this->_checkResponse($response);
    }
}
