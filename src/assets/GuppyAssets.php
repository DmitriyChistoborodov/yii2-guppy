<?php

namespace xbrodies\assets;

use yii\web\AssetBundle;

/**
 * Developer: skillet123q@gmail.com
 * Date: 18.08.2017
 * Time: 11:38
 */
class GuppyAssets extends AssetBundle
{
    public $basePath = __DIR__;
    public $baseUrl = "@web";

    public $css = [
        'css/style.css'
    ];
}