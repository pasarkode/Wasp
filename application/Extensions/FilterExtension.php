<?php namespace App\Extensions;

use Wasp\DI\Extension;

/**
 * Filter extension class
 *
 * @package Wasp
 * @subpackage Extensions
 * @author Dan Cox
 */
class FilterExtension extends Extension
{
	
	/**
	 * The extension alias
	 *
	 * @var string
	 */
	protected $alias = 'filters';

	/**
	 * Directory used for the file loader
	 *
	 * @var string
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
		$this->directory = dirname(__DIR__) . '/';
	}

	/**
	 * Run extension
	 *
	 * @return void
	 * @author Dan Cox
	 */
	public function extension()
	{
		$this->loader->load('filters.yml');
	}

} // END class FilterExtension extends Extension
