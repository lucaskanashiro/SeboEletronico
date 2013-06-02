<?php

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Sebo Eletronico',
	'sourceLanguage'=>'pt_br',
	'language'=>'pt_br',

	'preload'=>array('log'),

	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.controllers.*'
	),

	'modules'=>array(

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'sebo',

			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	'components'=>array(
		'user'=>array(

			'allowAutoLogin'=>true,
		),
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		'db'=>array(
			'connectionString' => 'pgsql:host=localhost;dbname=sebo',
			'emulatePrepare' => true,
			'username' => 'seboeletronico',
			'password' => 'sebo',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(

			'errorAction'=>'site/error',
		),
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

	'params'=>array(
            
		'adminEmail'=>'macario.junior@gmail.com',
	),
);