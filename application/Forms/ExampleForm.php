<?php namespace App\Forms;

use Wasp\Forms\Form,
	Wasp\Forms\Validation;

/**
 * Example form class
 *
 * @package App
 * @subpackage Forms
 * @author Dan Cox
 */
class ExampleForm extends Form
{

	/**
	 * String field
	 *
	 * @var Array
	 */
	public $name = Array(
		'name'		=> 'The name',
		'type'		=> 'text'
	);

	/**
	 * Textarea field
	 *
	 * @var Array
	 */
	public $description = Array(
		'name'		=> 'The description',
		'output'	=> 'Wasp\Forms\FieldOutput\TextAreaOutput'
	);

	/**
	 * Setup form validation and routing
	 *
	 * @author Dan Cox
	 */
	public function __construct()
	{
		$this->description['rules'] = [new Validation\Required];
		$this->name['rules'] = [new Validation\Email(), new Validation\Required()];

		parent::__construct();
	}

} // END class ExampleForm extends Form
