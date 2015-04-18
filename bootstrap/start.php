<?php

/**
 *	Structure Settings
 *
 */
require_once __DIR__ . '/structure.php';

/**
 *	Composer
 *	---------------------------------------------------
 */
require_once ROOT . '/vendor/autoload.php';

/**
 *  Set up the profile
 */
$profile = new Wasp\Application\Profile(new Symfony\Component\Filesystem\Filesystem);

/**
 *	Check for profiles in the profiles file
 */
$profile->addProfiles( require_once __DIR__ . '/profiles.php' );

$profile->addFiles([
	'database',
	'application',
	'commands',
	'environments',
	'extensions',
	'templates',
], CONFIG);

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
 *	Registered Extensions
 *	---------------------------------------------------
 *
 */
$extensions = new Wasp\DI\ExtensionRegister;
$extensions->loadFromArray($settings['extensions']);

/**
 *	Build the application
 *	---------------------------------------------------
 *
 *
 */
$application = new Wasp\Application\Application($profile);
$application->registerEnvironments($settings['environments']);

$application->loadEnv($settings['application']['environment']);

// Include routes
$route = $application->getDI()->get('route');
require_once APPLICATION . 'Routes.php';

return $application;
