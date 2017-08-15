<?php

namespace xbrodies\guppy;

use yii\base\BootstrapInterface;

/**
 * Developer: skillet123q@gmail.com
 * Date: 14.08.2017
 * Time: 17:13
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    public $controllerNamespace = 'xbrodies\guppy\controllers';

    /**
     * Bootstrap method to be called during application bootstrap stage.
     *
     * @param \yii\base\Application $app the application currently running
     */
    public function bootstrap($app)
    {
//        $app->getUrlManager()->rules[$this->id] = $this->id . '/guppy-admin/index';
        $app->getUrlManager()->addRules([
            [
                'class'   => 'yii\web\UrlRule',
                'pattern' => $this->id,
                'route'   => $this->id . '/guppy-admin/index',
            ],
            [
                'class'   => 'yii\web\UrlRule',
                'pattern' => $this->id . '/<id:\w+>',
                'route'   => $this->id . '/default/view',
            ],
            [
                'class'   => 'yii\web\UrlRule',
                'pattern' => $this->id . '/<controller:[\w\-]+>/<action:[\w\-]+>',
                'route'   => $this->id . '/<controller>/<action>',
            ],
        ], false);
//        die(var_dump($app->getUrlManager()->rules));
    }
}