<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$ConfigDir=dirname(__FILE__);
$modules = require_once($ConfigDir . DIRECTORY_SEPARATOR . 'modules.php');
$import=require_once($ConfigDir . DIRECTORY_SEPARATOR . 'import.php');
$db_local=require_once($ConfigDir . DIRECTORY_SEPARATOR . 'db_local.php');
$db_server=require_once($ConfigDir . DIRECTORY_SEPARATOR . 'db.php');
$db=(APP_DEPLOYED)?$db_local:$db_server;
return array(
		'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
		'name' => 'Traing Manage System',
		'language' => 'zh_cn',
		'theme' => 'aquarius',//aquarius,matrix
		// preloading 'log' component
		'preload' => array(
				'log',
				'input', //Filter
				'bootstrap', // preload the bootstrap component
		),
		// autoloading model and component classes
		'import' => $import,
		'aliases' => array(
				//yiibooster
				'bootstrap' => 'webroot.protected.extensions.bootstrap',
		),
		'modules' =>$modules,
		// application components
		'components' => array(
				'user' => array(
						// enable cookie-based authentication
						'allowAutoLogin' => true,
						'class' => 'application.components.WebUser',
				),
				//email
				'mailer' => array(
						'class' => 'application.extensions.mailer.EMailer',
				),
				//filter,security
				'input' => array(
						'class' => 'CmsInput',
						'cleanPost' => true,
						'cleanGet' => true,
						'cleanMethod' => 'stripClean'
				),
				//yiibooster
				'bootstrap' => array(
						//KSBootstrap extends Bootstrap just to load assets directly  from a folder in  webroot (yiibooster_assets),and
						//avoid publishing which I hate.
						'class' => 'ext.bootstrap.components.KSBootstrap',
						'coreCss' => false,
						'responsiveCss' => false
				),
				// uncomment the following to enable URLs in path-format
				'urlManager' => array(
						'urlFormat' => 'path',
						'showScriptName' => false,
						'rules' => array(
								'site/page/<view:\w+>' => 'site/page/',
								'<controller:\w+>/<id:\d+>' => '<controller>/view',
								'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
								'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
						),
				),
				/* 'db'=>array(
				 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
				), */
				// uncomment the following to use a MySQL database
				'db' => $db,
				'errorHandler' => array(
						// use 'site/error' action to display errors
						'errorAction' => 'site/error',
				),
				'log' => array(
						'class' => 'CLogRouter',
						'routes' => array(
								array(
										'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
										//  'levels' => 'error, warning',
								),
								// uncomment the following to show log messages on web pages
								/*
array(
		'class'=>'CWebLogRoute',
),
*/
						),
				),
				'clientScript' => array(
						'class' => 'CClientScript',
						'scriptMap' => array(
								'jquery.js' => false,
								'jquery.min.js' => false
						),
						'coreScriptPosition' => CClientScript::POS_END,
				),
		),
		// application-level parameters that can be accessed
		// using Yii::app()->params['paramName']
		'params' => array(
        'fromEmail' => 'samubrap@gmail.com',
        'replyEmail' => 'samubrap@gmail.com',
        'myEmail' => 'samubrapeng@gmail.com',
        'gmail_password' => 'suiyi635803',
        // 'recaptcha_private_key'=>'[FILL IN YOUR KEY]',// captcha will not work without these keys!
        //  'recaptcha_public_key'=>'[FILL IN YOUR KEY]',http://www.google.com/recaptcha
        'contactRequireCaptcha' => false,
        //Choose Bootswatch theme,default is default bootstrap theme.See http://bootswatch.com/
        //Options:default,slate,amelia,cerulean,cyborg, journal,readable,simplex,spacelab,superhero,united
        // 'bootswatch_theme' => 'slate'
        'bootswatch_theme' => 'default'
    ),
);