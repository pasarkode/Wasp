<?php

/**
 *	Composer
 *	---------------------------------------------------
 */
require_once dirname( __DIR__ ) . '/vendor/autoload.php';

/**
 *  Set up the profile
 */
$profile = new Wasp\Application\Profile(new Symfony\Component\Filesystem\Filesystem);

/**
 *	Check for profiles in the profiles file
 */
$profiles = require_once __DIR__ . '/profiles.php';

foreach ($profiles as $host => $folder)
{
	$profile->addProfile($host, $folder);
}

$profile->setDirectory(dirname(__DIR__) . '/config/');
$profile->addFiles([
	'database',
	'application',
	'environments'
]);

$profile->settings();
$settings = $profile->getSettings();

/**
 *	Debug 
 *  ---------------------------------------------------
 */
if($settings['application']['debug'])
{
	Symfony\Component\Debug\Debug::enable();
}

/**
 *	Build the application
 *	---------------------------------------------------
 *
 *
 */
$application = new Wasp\Application\Application();
$application->profile = $profile;

// Register the environments from the configuration
foreach ($settings['environments'] as $name => $env)
{
	$application->registerEnvironment($name, $env);
}

// load the environment
$application->loadEnv($settings['application']['environment']);

// Include routes
require_once dirname(__DIR__) . '/application/Routes.php';

return $application;
