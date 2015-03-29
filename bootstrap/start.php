<?php

/**
 *	Composer
 *	---------------------------------------------------
 *
 * 
 */
require_once dirname( __DIR__ ) . '/vendor/autoload.php';

// Debug on all the time while this is in development
Symfony\Component\Debug\Debug::enable();

/**
 *	Load settings from the config files
 */
$connections = require_once dirname( __DIR__ ) . '/config/database.php';
$appsettings = require_once dirname( __DIR__ ) . '/config/application.php';
$environments = require_once dirname( __DIR__ ) . '/config/environments.php';

/**
 *	Build the application
 *	---------------------------------------------------
 *
 *
 */
$application = new Wasp\Application\Application();

// Register the environments from the configuration
foreach ($environments as $name => $env)
{
	$application->registerEnvironment($name, $env);
}

// load the environment
$application->loadEnv($appsettings['environment']);

return $application;