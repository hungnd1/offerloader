<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'aliases' => [
        '@version_folder' => 'version_file',
        '@content_images' =>'content_images',
        '@ads_images' => 'ads_image',
        '@cat_image' => 'cat_images',
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\Subscriber',
            'enableSession' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                ],
            ],
        ],

//        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'enableStrictParsing' => false,
//            'showScriptName' => true,
//            'rules' => [
//                'GET category/<type:\d+>' => 'category/index',
//                'GET content/<id:\d+>' => 'content/detail',
//                'GET related/<id:\d+>' => 'content/related',
//                'GET content/list-content/type=<type:\d>/category=<category:\d>/filter=<filter:\d>/keyword=<keyword:\w+>' => 'content/list-content',
//                'POST register' => 'user/register',
//                'GET verify/<verify_code:\w+>/<username:\w+>' => 'user/verify',
//                'GET login/<username:\w+>/<password:\w+>' => 'user/login',
//                'GET user-info' => 'user/user-info',
//                'POST change-password' => 'user/change-password',
//                'POST edit-profile' => 'user/edit-profile',
//                'GET content/<content_id:\d>' => 'content/detail',
//
//            ],
//        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->format != \yii\web\Response::FORMAT_HTML) { // thucnc: them dieu kien nay de gii va debug hoat dong bt
                    // && !empty(Yii::$app->request->get['suppress_response_code']
                    if ($response->data !== null) {
                        $data = $response->data;
                        $response->data = [
                            'success' => $response->isSuccessful,
                            'statusCode' => $response->statusCode,

                        ];
                        if ($response->isSuccessful) {
                            if (isset($data['message'])) {
                                $response->data['message'] = $data['message'];
                            }
                            $response->data['data'] = $data;
                        }
                        else {
                            if (isset($data['message'])) {
                                $response->data['message'] = $data['message'];
                            }
                            $response->data['errorCode'] = isset($data['code'])?$data['code']:-1;
                            $response->data['errorName'] = isset($data['name'])?$data['name']:"Unknown";
                        }

                        $response->statusCode = 200;
                    }
                }
            },
        ],
    ],
    'params' => $params,
];
