<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
$dirname = dirname(__FILE__);
return array(
	'basePath' => $dirname . DIRECTORY_SEPARATOR . '..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array(
        'log'
     ),

	// application components
	'components'=>array(
		'db'         => require($dirname . '/database.php'),
        
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
    'modules' => array(
        'user' => array(
            'defaultController' => 'user',
        ),
    ),
);