<?php

/**
 * ProcessWire Configuration File
 *
 * Site-specific configuration for ProcessWire.
 * https://processwire.com/api/ref/config/
 *
 * Please see the file /wire/config.php which contains all configuration options you may
 * specify here. Simply copy any of the configuration options from that file and paste
 * them into this file in order to modify them.
 *
 * ProcessWire 3.x
 * Copyright (C) 2019 by Ryan Cramer
 *
 * https://processwire.com
 *
 */

if(!defined("PROCESSWIRE")) die();

/*** SITE CONFIG *************************************************************************/

$config->prependTemplateFile = '_init.php';
$config->appendTemplateFile = '_main.php';
$config->useMarkupRegions = true;
$config->useFunctionsAPI = true; 


/*** INSTALLER CONFIG ********************************************************************/



/**
 * Installer: Database Configuration
 * 
 */
$config->dbHost = 'localhost';
$config->dbName = 'waveinside';
$config->dbUser = 'root';
$config->dbPass = '';
$config->dbPort = '3306';
$config->dbEngine = 'InnoDB';

$config->dbName = 'waveinside1154';
$config->dbUser = 'waveinside1154';
$config->dbPass = 'V4cFoX4btdNHuJW';

/**
 * Installer: User Authentication Salt 
 * 
 * Must be retained if you migrate your site from one server to another
 * 
 */
$config->userAuthSalt = 'de90f5cd0e451d713617551f0acd8771'; 

/**
 * Installer: File Permission Configuration
 * 
 */
$config->chmodDir = '0755'; // permission for directories created by ProcessWire
$config->chmodFile = '0644'; // permission for files created by ProcessWire 

/**
 * Installer: Time zone setting
 * 
 */
$config->timezone = 'Europe/Helsinki';

/**
 * Installer: Admin theme
 * 
 */
$config->defaultAdminTheme = 'AdminThemeUikit';

/**
 * Installer: Unix timestamp of date/time installed
 * 
 * This is used to detect which when certain behaviors must be backwards compatible.
 * Please leave this value as-is.
 * 
 */
$config->installed = 1573626982;


/**
 * Installer: HTTP Hosts Whitelist
 * 
 */
$config->httpHosts = array('waveinside.test', 'www.waveinside.test', 'waveinside.com', 'www.waveinside.com');


/**
 * Installer: Debug mode?
 * 
 * When debug mode is true, errors and exceptions are visible. 
 * When false, they are not visible except to superuser and in logs. 
 * Should be true for development sites and false for live/production sites. 
 * 
 */
$config->debug = false;

