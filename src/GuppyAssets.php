<?php

namespace xbrodies\guppy;

use yii\web\AssetBundle;

/**
 * Developer: skillet123q@gmail.com
 * Date: 31.08.2017
 * Time: 11:05
 */
class GuppyAssets extends AssetBundle
{
    public $sourcePath = '@xbrodies/guppy/assets';
    public $css = [
        'css/style.css',
    ];
    public $js = [
        'libs/semantic/dist/semantic.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}