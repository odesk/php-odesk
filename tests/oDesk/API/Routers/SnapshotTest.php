<?php
namespace oDesk\API\Tests\Routers;

require_once __DIR__  . '/CommonTestRouter.php';

class SnapshotTest extends CommonTestRouter
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
    public function testGet()
    {
        $router = new \oDesk\API\Routers\Snapshot($this->_client);
        $response = $router->get('company', 'username', '1234567890');
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testUpdate()
    {
        $router = new \oDesk\API\Routers\Snapshot($this->_client);
        $response = $router->update('company', 'username', '1234567890', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testDelete()
    {
        $router = new \oDesk\API\Routers\Snapshot($this->_client);
        $response = $router->delete('company', 'username', '1234567890');
        
        $this->_checkResponse($response);
    }
}
