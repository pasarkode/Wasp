<?php namespace App\Environment;

use Wasp\Environment\Environment,
	Wasp\Environment\EnvironmentInterface;

/**
 * Standard production environment
 *
 * @package Wasp
 * @subpackage Environments
 * @author Dan Cox
 **/
class Production extends Environment implements EnvironmentInterface
{

	/**
	 * Build essential packages
	 *
	 * @return void
	 * @author Dan Cox
	 **/
	public function setup()
	{
		$this->createDIFromCache();

		$this->startTemplating(VIEWS);
		$this->setupConnections();
		$this->connect();

		// Shield Wall Listener
		$this->DI->get('kernel.dispatcher')
				 ->addListener(KernelEvents::REQUEST, [$this->DI->get('shield.listener'), 'onKernelRequest']);
	}

} // END class Production extends Environment implements EnvironmentInterface
