<?php namespace App\Extensions;

use Wasp\DI\Extension;

/**
 * Extension class for using forms
 *
 * @package Wasp
 * @subpackage Extension
 * @author Dan Cox
 */
class FormExtension extends Extension
{

	/**
	 * Extension alias
	 *
	 * @var String
	 */
	protected $alias = 'forms';

	/**
	 * The directory used for file loader
	 *
	 * @var String
	 */
	protected $directory;

	/**
	 * Set uo extension
	 *
	 * @return void
	 * @author Dan Cox
	 */
	public function setup()
	{
		$this->directory = APPLICATION;
	}

	/**
	 * Run extension
	 *
	 * @return void
	 * @author Dan Cox
	 */
	public function extension()
	{
		$this->loader->load('forms.yml');
	}

} // END class FormExtension extends Extension
