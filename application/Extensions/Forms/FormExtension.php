<?php

namespace App\Extensions\Forms;

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
		$this->directory = __DIR__;
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
