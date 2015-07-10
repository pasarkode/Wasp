<?php

/**
 *	Database connections 
 *	--------------------------------------------------------
 *	Connections should be added to the array underneath,
 *	they should be formatted with the connection name as key
 *	and details for that connection in an array, eg.
 *	
 *	default => ['driver' => '', 'user' => '', 'password' => '', 'dbname' => '']
 */
return Array(

	'connections' => Array (

		'default' => Array( 
			'driver' 		=> 'pdo_mysql', 
			'user' 			=> 'user',
			'password'		=> '',
			'dbname'		=> 'wasp',
			'models'		=> MODELS ),
	),
);
