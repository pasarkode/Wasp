<?php

/**
 *	Environments
 *	----------------------------------------------------------
 *	Environments control how the application is built, you can
 *	create your own environment, or replace one of the
 *	existing environment classes. Just be sure to add it to
 *	the array below, or it wont be registered!
 *
 */
return Array(
	
	'develop'				=> 'App\Environment\Develop',

	'production'			=> 'App\Environment\Production',
	
);
