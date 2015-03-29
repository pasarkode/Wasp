<?php namespace Wasp\Env;

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
	 * Build essentially packages
	 *
	 * @return void
	 * @author Dan Cox
	 **/
	public function setup()
	{
		$this->createDIFromCache();
	}

} // END class Production extends Environment implements EnvironmentInterface