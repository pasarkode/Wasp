<?php

/**
 *	Templates
 *	-----------------------------------------------------
 *	Settings for the template delegating engine.
 *
 */
return Array(

	'twig'			=> Array(

		'cache'						=> CACHE . '/templates/',
		'debug'						=> false,
		'base_template_class'		=> 'Twig_Template',
		'autoescape'				=> true,

	),

);
