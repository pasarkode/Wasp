<?php

/**
 *	Directory Constants
 *
 */
define('ROOT',			dirname(__DIR__));
define('CACHE', 		ROOT . '/cache/');
define('APPLICATION',	ROOT . '/application/');
define('AUTH',			APPLICATION . '/Auth/');
define('CONFIG',		APPLICATION . '/Config/');
define('ENVIRONMENTS',	APPLICATION . '/Environments/');
define('VIEWS', 		APPLICATION . '/Views/');
define('MODELS', 		APPLICATION . '/Models/');

/**
 *	File Constants
 *
 */
define('ROUTEFILE', 	APPLICATION . 'Routes.php');
