<?php return [
    'user' => [
        'class' => 'yii\web\User',
        'identityClass' => 'dektrium\user\models\User',
        'enableAutoLogin' => true,
        'loginUrl' => ['/user/security/login'],
    ],
    'view' => [
        'class' => 'yii\web\View',
        'renderers' => [
            'twig' => [
                'class' => 'yii\twig\ViewRenderer',
                'cachePath' => '@runtime/Twig/cache',
                // Array of twig options:
                'options' => [
                    'auto_reload' => true,
                ],
                'globals' => [
                    'html' => ['class' => '\yii\helpers\Html'],
                ],
                'uses' => ['yii\bootstrap'],
            ]
        ],
    ]
];