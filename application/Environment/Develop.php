<?php namespace App\Environment;

use Wasp\Environment\Environment,
	Wasp\Environment\EnvironmentInterface,
	Symfony\Component\HttpKernel\KernelEvents;

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

		$this->startTemplating(VIEWS);
		$this->setupConnections();
		$this->connect();

		// Shield Wall Listener
		$this->DI->get('kernel.dispatcher')
				 ->addListener(KernelEvents::REQUEST, [$this->DI->get('shield.listener'), 'onKernelRequest']);
	}

} // END class Develop extends Environment implements EnvironmentInterface
