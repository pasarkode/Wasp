<?php

/**
 *	Routes
 *	---------------------------------------------------
 *	Use the route variable to specify routes in this
 *	file.
 */
$route->add('site.home', '/', Array('GET'), Array('_controller' => 'App\Controllers\HomeController::showHome'));

