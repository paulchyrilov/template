<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$dirname = dirname(__FILE__);
return array(
	'basePath' => $dirname . DIRECTORY_SEPARATOR . '..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload' => array(
		'log',
	),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'urlManager' => require($dirname . '/url_manager.php'),
		'db'=>require($dirname . '/database.php'),
		
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to use a MySQL database
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'log'         => array(
			    'class'  => 'CLogRouter',
			    'routes' => array(
				array(
				    'class'  => 'CFileLogRoute',
				    'levels' => 'error, warning',
				),
				array(
				    'class'      => 'CWebLogRoute',
				    'categories' => '*'
				)
			    ),
			),
		),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']

	'params' => require($dirname . '/params.php'),
);