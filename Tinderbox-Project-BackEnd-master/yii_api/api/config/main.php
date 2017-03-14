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
    'bootstrap' => ['log'],
    'modules' => [
        'auth' => [
            'basePath' => '@app/modules/auth',
            'class' => 'api\modules\auth\AuthModule'
        ],
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\v1Module'
        ]
    ],
    'components' => [        
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/announcement'
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/information'
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/faq'
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/message'
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/supervisor'
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/shift'
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'auth/user'
                ]
            ],        
        ],
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
    ],
    'params' => $params,
];



