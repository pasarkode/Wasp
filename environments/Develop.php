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
	}

} // END class Develop extends Environment implements EnvironmentInterface