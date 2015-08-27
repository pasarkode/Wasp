<?php namespace App\Filters;

use Wasp\Filter\FilterInterface,
	Wasp\DI\DependencyInjectionAwareTrait,
	Wasp\ShieldWall\Exceptions;

/**
 * Filter class for standard authentication
 *
 * @package App
 * @subpackage Filters
 * @author Dan Cox
 */
class Auth implements FilterInterface
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

		$this->DI->get('shield')->map->add($route, ['secure' => true]);

		try {

			$this->DI->get('shield')->request($route, $event->getRequest());

		} catch (Exceptions\AuthenticationException $e) {

			$response = $this->DI->get('response')->redirect('/login');
			$event->setResponse($response);
		}
	}

} // END class Auth implements FilterInterface
