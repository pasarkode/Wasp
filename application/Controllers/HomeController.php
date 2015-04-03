<?php namespace Project\Controllers;

use Wasp\Controller\BaseController;

/**
 * Home Controller
 *
 **/
class HomeController extends BaseController
{

	/**
	 * Shows the home page
	 *
	 * @return Template
	 **/
	public function showHome()
	{
		return $this->template->make('home.twig.html');
	}

} // END class HomeController extends BaseController
