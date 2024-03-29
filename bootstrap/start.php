<?php

/**
 *	Structure Settings
 */
require_once __DIR__ . '/structure.php';

/**
 *	Composer
 */
$loader = require_once ROOT . '/vendor/autoload.php';

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
    'assets',
	'commands',
	'environments',
	'extensions',
	'templates',
], CONFIG);

$profile->settings();
$settings = $profile->getSettings();

/**
 *	Debug
 */
if($settings['application']['debug'])
{
	Symfony\Component\Debug\Debug::enable();
}

/**
 *	Date Settings
 */
date_default_timezone_set($settings['application']['timezone']);

/**
 *	Registered Extensions
 */
$extensions = new Wasp\DI\ExtensionRegister;
$extensions->loadFromArray($settings['extensions']);

/**
 *	Build the application
 */
$application = new Wasp\Application\Application($profile);
$application->registerEnvironments($settings['environments']);

$application->loadEnv($settings['application']['environment']);

$route = $application->getDI()->get('route');

/**
 *  Routes
 */
require_once APPLICATION . 'Routes.php';

/**
 * Doctrine Annotation Engine
 */
Doctrine\Common\Annotations\AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

/**
 *  Asset registry
 */
$application->getDI()->get('assets')->registerAssets($settings['assets']);

/**
 *  Return the App for further processing.
 */
return $application;
