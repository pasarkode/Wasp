<?php namespace App\Extensions\Filters;

use Wasp\DI\Extension;

/**
 * Filter extension class
 *
 * @package Wasp
 * @subpackage Extension
 * @author Dan Cox
 */
class FilterExtension extends Extension
{
	/**
	 * The extension alias
	 *
	 * @var String
	 */
	protected $alias = 'filter';

	/**
	 * The directory to find the service configuration
	 *
	 * @var String
	 */
	protected $directory;

	/**
	 * Set up extension
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
		$this->loader->load('filters.yml');
	}

} // END class FilterExtension extends Extension
