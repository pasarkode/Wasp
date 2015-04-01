<?php

/**
 *	Routes 
 *	---------------------------------------------------
 *	Use the route variable to specify routes in this
 *	file.
 */
$route = Wasp\DI\DI::getContainer()->get('route');

/**
 *	Home Page
 */
$route->add('site.home', '/', Array('GET'), Array('controller' => 'Project\Controllers\HomeController::showHome'));