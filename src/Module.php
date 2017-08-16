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


    public $haml = [
        'class' => 'mervick\mthaml\HamlViewRenderer',
//        'cachePath' => '@runtime/Haml/cache',
        'debug' => false,
        'options' => [
            'format' => 'html5',
            // MtHaml escapes everything by default
            'enable_escaper' => true,
            'escape_html' => true,
            'escape_attrs' => true,
            'cdata' => true,
            'autoclose' => array('meta', 'img', 'link', 'br', 'hr', 'input', 'area', 'param', 'col', 'base'),
            'charset' => 'UTF-8',
            'enable_dynamic_attrs' => true,
        ],
    ];

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
     * @var Application
     */
    private $_app;

    /**
     * Bootstrap method to be called during application bootstrap stage.
     *
     * @param \yii\base\Application $app the application currently running
     */
    public function bootstrap($app)
    {
        $this->create($app)
            ->configureRoute()
            ->configureView();
    }


    private function configureRoute()
    {
        $this->_app->getUrlManager()->addRules([
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

        return $this;
    }

    private function configureView()
    {
//        $this->_app->getView()->renderers = [
//          'haml' => $this->haml,
//          'twig' => $this->twig
//        ];

//        $this->_app->getView()->renderers['haml'] = $this->haml;
//        $this->_app->getView()->renderers['twig'] = $this->twig;
    }

    private function create($app)
    {
        $this->_app = $app;
        return $this;
    }
}