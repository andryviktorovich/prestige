<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'project',
    'language' => 'ru-RU',
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'enableStrictParsing' => true,
            'rules' => [

                'company/<page>'=>'company/index',
                '<controller>/<action>/<page:\w+>' => '<controller>/<action>',
            ]
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '4zE0CFRknjJnNdxQB3ldOXwvhsPSEi1n',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'project/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'booleanFormat'=>['Нет','Да'],
            'dateFormat' => 'php:Y.m.d',         //Тут можно формат вывода дат по умолчанию настроить
            'datetimeFormat' => 'php:Y.m.d H:i',
            'timeFormat' => 'short',
            'nullDisplay'=>'Не задано',
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'aliases' => [
        '@image' => '/var/www/v-21951/data/www/prestige-b-g.com/public/images/uploads',//'/home/andry/workspace/prs/public/images/uploads',
        '@image_view' => '/public/images/uploads',
        '@image_system' => '/public/images',
        '@project' => 'public/images/projects',
    ],

    'params' => $params,
];
//
//if (YII_ENV_DEV) {
//    // configuration adjustments for 'dev' environment
//    $config['bootstrap'][] = 'debug';
//    $config['modules']['debug'] = [
//        'class' => 'yii\debug\Module',
//    ];
//
//    $config['bootstrap'][] = 'gii';
//    $config['modules']['gii'] = [
//        'class' => 'yii\gii\Module',
//    ];
//}

return $config;
