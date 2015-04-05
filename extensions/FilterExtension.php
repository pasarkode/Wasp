<?php namespace Wasp\Extensions;

use Wasp\DI\Extension;

/**
 * Extension class for filters
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
	 * Directory for file loading
	 *
	 * @var string
	 */
	protected $directory;

	/**
	 * Set up extensions
	 *
	 * @return void
	 * @author Dan Cox
	 */
	public function setup()
	{
		$this->directory = dirname(__DIR__) . '/config/';
	}

	/**
	 * Extend!
	 *
	 * @return void
	 * @author Dan Cox
	 */
	public function extension()
	{
		$this->loader->load('filters');
	}


} // END class FilterExtension extends Extension
