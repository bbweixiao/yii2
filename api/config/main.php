<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'language' => 'zh-CN',
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
        ],
        'v1' => [
            'class' => 'api\modules\v1\Module',
        ],
    ],
    'aliases' => [
        '@mdm/admin' => '@vendor/mdmsoft/yii2-admin',
    ],

    'components' => [

        'request' => [
            'csrfParam' => '_csrf-api',
        ],
        'response'=>[
            'class'=>'yii\web\Response',
            'on beforeSend'=>function($event){
                $response=$event->sender;
                if($response->data!==null&&Yii::$app->request->get('suppress_response_code')){
                    $response->data=[
                        'success'=>$response->isSuccessful,
                        'data'=>$response->data,
                    ];
                    $response->statusCode=200;
                }
            },
        ],
        'user' => [
            'enableAutoLogin' => true,
            'loginUrl'        =>null,
            'identityClass' => 'api\models\User',
            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
            'enableSession'=>false
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-api',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'suffix' => '',
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['v1/goods'],

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/user',
                    'extraPatterns' => [
                        'POST login' => 'login',
                        'GET signup-test' => 'signup-test',
                        'POST versions' => 'version',
                        'POST signup' => 'signup',
                        'POST showdatas' => 'showdata',
                    ]
                ],
            ],
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            //这里是允许访问的action，不受权限控制
            'v1/*',
        ]
    ],
    'params' => $params,
];
