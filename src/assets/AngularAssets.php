<?php
/**
 * Developer: skillet123q@gmail.com
 * Date: 24.08.2017
 * Time: 9:29
 */

namespace xbrodies\assets;


use yii\web\AssetBundle;

class AngularAssets extends AssetBundle
{
    public $sourcePath = '@bower';
    public $js = [
        'angular/angular.js',
        'angular-route/angular-route.js',
        'angular-strap/dist/angular-strap.js',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}