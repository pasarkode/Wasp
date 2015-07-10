<?php

/**
 *	Testing bootstrap file
 *	------------------------------------------------------
 *	If you have custom requirements for tests cases, then
 *	this is the perfect place start. 
 */
$loader = require_once dirname( __DIR__ ) . '/vendor/autoload.php';

Doctrine\Common\Annotations\AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

require_once dirname( __DIR__ ) . '/bootstrap/structure.php';

