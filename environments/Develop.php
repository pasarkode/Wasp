<?php namespace Wasp\Env;

use Wasp\Environment\Environment,
	Wasp\Environment\EnvironmentInterface;

/**
 * Development environment
 *
 * @package Wasp
 * @subpackage Environments
 * @author Dan Cox
 **/
class Develop extends Environment implements EnvironmentInterface
{

	/**
	 * Build essential environment tools
	 *
	 * @return void
	 * @author Dan Cox
	 **/
	public function setup()
	{
		$this->createDI();

		/**
		 *  Set up templating
		 */
		$this->startTemplating();
	}

	/**
	 * Loads the twig engine into the template delegator
	 *
	 * @return void
	 * @author Dan Cox
	 **/
	public function startTemplating()
	{
		$template = $this->DI->get('template');
		$twig = $this->DI->get('twigengine');

		$template->setDirectory(dirname(__DIR__) . '/application/Views/');
		$twig->create();

		$template		 
			->addEngine($twig)
			->start();
	}

} // END class Develop extends Environment implements EnvironmentInterface
