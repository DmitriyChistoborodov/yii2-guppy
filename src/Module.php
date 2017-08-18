<?php

namespace xbrodies\guppy;

use yii\base\BootstrapInterface;
use yii\web\Application;

/**
 * Developer: skillet123q@gmail.com
 * Date: 14.08.2017
 * Time: 17:13
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    public $controllerNamespace = 'xbrodies\guppy\controllers';

    /**
     * Configure `components.view.renderer.twig`
     *
     * @var array
     */
    public $twig = [
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
    ];

    /**
     * Bootstrap method to be called during application bootstrap stage.
     *
     * @param \yii\web\Application $app the application currently running
     */
    public function bootstrap($app)
    {
        $this->configureRoute($app)
            ->configureView($app);
    }


    /**
     * Configure route map
     *
     * @param Application $app
     * @return Module $this
     */
    private function configureRoute($app)
    {
        $app->getUrlManager()->addRules([
            [
                'class'   => 'yii\web\UrlRule',
                'pattern' => $this->id,
                'route'   => $this->id . '/guppy-admin/index',
            ],
        ], false);

        return $this;
    }

    /**
     * Configure `components.views.renderer` for module & frontend
     *
     * @param Application $app
     * @return Module $this
     */
    private function configureView($app)
    {
        $app->getView()->renderers['twig'] = $this->twig;

        return $this;
    }
}