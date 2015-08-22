<?php

/**
 *	Application Settings
 *	-----------------------------------------------------
 *	You can set application settings in this file.
 */
return Array(

	/**
	 *	Basic Settings
	 */
	'name'										=> 'Wasp',
	'cli_name'									=> 'Wasp Framework CLI',
	'environment'								=> 'develop',
	'version'									=> '0.1.0',

	/**
	 *	Database
	 *
	 */
	'default_connection'						=> 'default',

	/**
	 *	Debug - Set to true for stack traced debug.
	 */
	'debug'										=> false,

	/**
	 *	DI Cache Settings
	 *
	 */
	'di_cache_directory'						=> CACHE . 'AppCache.php',
	'di_cache_namespace'						=> 'Wasp\Cache',

	/**
	 *	Date settings
	 *
	 */
	'timezone'									=> 'GMT',
);
