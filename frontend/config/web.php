<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@app/themes/advance'],
                'baseUrl' => '@app/themes/advance',
            ],
        ],
        'mobileDetect' => [
            'class' => '\ezze\yii2\mobiledetect\MobileDetect'
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'hl-1nd93H281efs',
            'enableCookieValidation' => true,   //cuongvm add
            'enableCsrfValidation' => true,  //cuongvm add
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\sUser',
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
        'urlManagerApi' => [
            'class' => 'yii\web\UrlManager',
            'scriptUrl' => "http://localhost/offerloader.git/api/web/",
            'baseUrl' => "http://localhost/offerloader.git/api/web/",
//            'scriptUrl' => "http://localhost/vgame-web/api/web/",
//            'baseUrl' => "http://localhost/vgame-web/api/web/",
        ],

        'urlManagerPublic' => [
            'class' => 'yii\web\UrlManager',
            'scriptUrl' => "http://localhost:8080/vgame-basic/web/",
            'baseUrl' => "http://localhost:8080/vgame-basic/web/",
//            'scriptUrl' => "http://localhost/vgame-basic/web/index.php",
//            'baseUrl' => "http://localhost/vgame-basic/web/index.php"
        ],

//        'db' => require(__DIR__ . '/db.php'),
//        'formatter' => [
//            'class' => 'yii\i18n\Formatter',
//            'thousandSeparator' => '.',
//            'decimalSeparator' => '.',
//            'currencyCode' => '$'
//        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}
return $config;
