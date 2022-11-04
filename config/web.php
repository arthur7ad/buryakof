<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');
$modules = require_once(__DIR__ . '/modules.php');
$aliases = require(__DIR__ . '/aliases.php');


$config = [
    'id' => 'basic',
    'name' => 'Эльгруз',
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => $aliases,
    'layout' => 'default',
    'components' => [
        'formatter' => [
            'class' => 'app\components\CustomFormatter',
            'dateFormat' => 'php:d.m.Y',
            'datetimeFormat' => 'php:j F, H:i',
            'timeFormat' => 'php:H:i:s',
            'defaultTimeZone' => 'Europe/Moscow',
            'locale' => 'ru-RU',
            'numberFormatterOptions' => [
                NumberFormatter::DECIMAL_SEPARATOR_SYMBOL => '.',
                NumberFormatter::MAX_FRACTION_DIGITS => 2,
                NumberFormatter::MIN_FRACTION_DIGITS => 0,
            ],
            'numberFormatterSymbols' => [
                NumberFormatter::CURRENCY_SYMBOL => '₽',
            ],
            'nullDisplay' => '',
        ],
        'ipgeobase' => [
            'class' => 'himiklab\ipgeobase\IpGeoBase',
            'useLocalDB' => true,
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'le2zajaic9Ea3The8SeipietaK2Aini6Aruu9boh',
            'baseUrl' => '',
        ],
        'view' => [
            'class' => 'app\components\CustomView',
        ],
        'city' => [
            'class' => 'app\modules\city\City',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'info' => [
            'class' => 'app\modules\info\models\Info',
        ],
        'counts' => [
            'class' => 'app\components\Counts',
        ],
        'yon' => [
            'class' => 'app\components\YesNo',
        ],
        'helper' => [
            'class' => 'app\components\Helper',
        ],
        'view' => [
            'class' => 'app\components\CustomView',
        ],
        'imagemanager' => [
            'class' => 'noam148\imagemanager\components\ImageManagerGetPath',
            //set media path (outside the web folder is possible)
            'mediaPath' => 'uploads/image/ico',
            //path relative web folder to store the cache images
            'cachePath' => 'assets/images',
            //use filename (seo friendly) for resized images else use a hash
            'useFilename' => true,
            //show full url (for example in case of a API)
            'absoluteUrl' => true,
        ],
        'user' => [
            'identityClass' => 'app\modules\user\models\User',
            'loginUrl' => ['/user/default/login'],
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'viewPath' => '@app/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.com', // e.g. smtp.mandrillapp.com or smtp.gmail.com
                'username' => 'el9ruz@yandex.ru',
                'password' => '25022019elgruz',
                'port' => '25', // Port 25 is a very common port too
                'encryption' => 'tls', // It is often used, check your provider or mail server specs
            ],
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
        'db' => $db,
//        'db_old' => $db2,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',
                '/login' => '/user/default/login',
                '/register' => '/user/default/signup',
                'site/index' => 'site/index',
                'site/file-img-upload' => 'site/file-img-upload',
                'site/image-upload' => 'site/image-upload',
                '/cabinet' => '/page/admin/index',
                '/sitemap' => '/sitemap/default/page',
                '/sitemap.xml' => '/sitemap/default/index',
                '/robots.txt' => '/robots/robot/index',
                '/market.yml' => '/yml/default/index',
                '/search' => '/search/default/index',
                '/faq' => '/faq/default/index',
                '/cabinet' => '/cabinet/default/index',
                '/review' => '/review/default/index',
                '/calc' => '/calc/default/index',
                '/imagemanager/manager' => '/imagemanager/manager/index',
                [
                    'class' => 'app\components\CustomUrlRule',
                ],
                '<module:[-\w]+>/<controller:[-\w]+>/<action:[-\w]+>/<id:\d+>' => '<module>/<controller>/<action>',
                '<module:[-\w]+>/<controller:[-\w]+>/<action:[-\w]+>' => '<module>/<controller>/<action>',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => '@webroot/css/bootstrap',
                    'css' => [
                        'bootstrap.css' => 'bootstrap.css'
                    ]
                ]
            ]
        ],
        'ipgeobase' => [
            'class' => 'app\components\ipdata\IpGeoBase',
            'useLocalDB' => true,
        ],
    ],
    'modules' => $modules,
    
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
