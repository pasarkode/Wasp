<?php

use Wasp\Test\TestCase;

/**
 * Unit test for HomeController
 *
 */
class HomeControllerTest extends TestCase
{

	/**
	 * Set up test env
	 *
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();

		$this->setupTemplates(VIEWS);
		$route = $this->DI->get('route');

		require ROUTEFILE;
	}

	/**
	 * Test the response is ok
	 *
	 * @return void
	 */
	public function test_responseIsOK()
	{
		$response = $this->fakeRequest('/', 'GET');

		$this->assertTrue($response->isOK());
		$this->assertEquals(200, $response->getStatusCode());
	}

} // END class HomeControllerTest extends TestCase
