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
	 * @return void
	 * @author Dan Cox
	 */
	public function configure()
	{
		$this->description['rules'] = [new Validation\Required];
		$this->name['rules'] = [new Validation\Email(), new Validation\Required()];
	}

} // END class ExampleForm extends Form
