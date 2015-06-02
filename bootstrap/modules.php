<?php

/**
 * Sets up needed module structure
 *
 */
$DI = $application->getDI();

$MM = $DI->get('module.manager');
$MM->loadSettings($settings['modules']);
$MM->initFiles();
