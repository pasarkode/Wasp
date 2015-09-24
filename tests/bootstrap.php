<?php

/**
 *	Testing bootstrap file
 *	------------------------------------------------------
 *	If you have custom requirements for tests cases, then
 *	this is the perfect place start.
 */
$loader = require_once dirname( __DIR__ ) . '/vendor/autoload.php';

/**
 *  Register doctrine annotation loader
 *
 */
Doctrine\Common\Annotations\AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

/**
 *  Structural constants
 *
 */
require_once dirname( __DIR__ ) . '/bootstrap/structure.php';

