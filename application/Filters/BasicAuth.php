<?php

namespace App\Filters;

use Wasp\Filter\FilterInterface;
use	Symfony\Component\HttpFoundation\Response;
use	Wasp\ShieldWall\Exceptions;
use	Wasp\DI\DependencyInjectionAwareTrait;

/**
 * Filter class for basic auth
 *
 * @package App
 * @subpackage Filters
 * @author Dan Cox
 */
class BasicAuth implements FilterInterface
{
	use DependencyInjectionAwareTrait;

	/**
	 * Filter request
	 *
	 * @return void
	 * @author Dan Cox
	 */
	public function filter($event)
	{
		$route = $event->getRequest()->get('_route');

		$this->DI->get('shield')->map->add($route, ['secure' => true, 'basic_auth' => true]);

		try {

			$this->DI->get('shield')->request($route, $event->getRequest());

		} catch (Exceptions\AuthenticationException $e) {

			return $this->basicRequest($event);
		}
	}

	/**
	 * Checks basic auth details and sets the relevent response
	 *
	 * @return void
	 * @author Dan Cox
	 */
	public function basicRequest($event)
	{
		try {

			$this->DI->get('shield')->authenticateBasic();

		} catch (Exceptions\AuthenticationException $e) {

			$response = new Response('Invalid Credentials', 401, ['WWW-Authenticate' => 'Basic']);

			$event->setResponse($response);
		}
	}

} // END class BasicAuth implements FilterInterface
