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
	'modules',
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

// Module setup
require_once __DIR__ . '/modules.php';

$route = $application->getDI()->get('route');

// Include routes
require_once APPLICATION . 'Routes.php';

return $application;
