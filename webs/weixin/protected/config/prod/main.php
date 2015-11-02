<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

return array(

    'basePath'=> BASE_PATH.'/protected',
    'name'=>'顽主',

    'defaultController'=>'index',

    'import'=>array(
        'application.components.*',
        'application.components.widgets.*',
    ),

    'components' => array(
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controllers:\w+>/<id:\d+>' => '<controllers>/view',
                '<controllers:\w+>/<action:\w+>/<id:\d+>' => '<controllers>/<action>',
                '<controllers:\w+>/<action:\w+>' => '<controllers>/<action>',
            ),
        ),
        'curl' => array(
            'class' => 'application.components.curl.Curl'
        ),
        'errorHandler' => array(
            'errorAction' => 'index/error',
        ),
    ),

    'params'=> require_once dirname(__FILE__).'/param.php'

);