<?php

namespace App\Extensions\ShieldWall;

use Wasp\DI\Extension;

/**
 * Extension class for the Shield Wall
 *
 * @package Wasp
 * @subpackage Extension
 * @author Dan Cox
 */
class ShieldWallExtension extends Extension
{

	/**
	 * The Extension Alias
	 *
	 * @var String
	 */
	protected $alias = 'auth';

	/**
	 * The directory that the yml service file is contained
	 *
	 * @var String
	 */
	protected $directory;

	/**
	 * Set up extension details
	 *
	 * @return void
	 * @author Dan Cox
	 */
	public function setup()
	{
		$this->directory = __DIR__;
	}

	/**
	 * Perform extension
	 *
	 * @return void
	 * @author Dan Cox
	 */
	public function extension()
	{
		$this->loader->load('auth.yml');
	}

} // END class ShieldWallExtension extends Extension
