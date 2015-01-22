<?php
namespace oDesk\API\Tests\Routers;

require_once __DIR__  . '/CommonTestRouter.php';

class MetadataTest extends CommonTestRouter
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
    public function testGetCategories()
    {
        $router = new \oDesk\API\Routers\Metadata($this->_client);
        $response = $router->getCategories();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetCategoriesV2()
    {
        $router = new \oDesk\API\Routers\Metadata($this->_client);
        $response = $router->getCategoriesV2();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetSkills()
    {
        $router = new \oDesk\API\Routers\Metadata($this->_client);
        $response = $router->getSkills();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetRegions()
    {
        $router = new \oDesk\API\Routers\Metadata($this->_client);
        $response = $router->getRegions();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetTests()
    {
        $router = new \oDesk\API\Routers\Metadata($this->_client);
        $response = $router->getTests();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetReasons()
    {
        $router = new \oDesk\API\Routers\Metadata($this->_client);
        $response = $router->getReasons(array());
        
        $this->_checkResponse($response);
    }
}
