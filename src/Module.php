<?php
/**
 * Developer: skillet123q@gmail.com
 * Date: 18.08.2017
 * Time: 14:28
 */

namespace xbrodies\guppy;


use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\helpers\ArrayHelper;

class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * @var string the namespace that controller classes are in.
     * This namespace will be used to load controller classes by prepending it to the controller
     * class name.
     *
     * If not set, it will use the `controllers` sub-namespace under the namespace of this module.
     * For example, if the namespace of this module is `foo\bar`, then the default
     * controller namespace would be `foo\bar\controllers`.
     *
     * See also the [guide section on autoloading](guide:concept-autoloading) to learn more about
     * defining namespaces and how classes are loaded.
     */
    public $controllerNamespace = 'xbrodies\guppy\controllers';

    public $g_components = [

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

    public $g_modules = [


    ];

    public function __construct($id, $parent = null, array $config = [])
    {



        if(key_exists('g_modules', $config))
            $config['g_modules'] = ArrayHelper::merge($this->g_modules, $config['g_modules']);

        if(key_exists('g_components', $config))
            $config['g_components'] = ArrayHelper::merge($this->g_components, $config['g_components']);

        parent::__construct($id, $parent, $config);
    }


    /**
     * Bootstrap method to be called during application bootstrap stage.
     *
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
//        die(var_dump(get_declared_classes() ));
//        $daw = new \dektrium\user\Bootstrap();
//        $daw->bootstrap($app);
//        $app->getUrlManager()->addRules([
//            [
//                'class' => 'yii\web\UrlRule',
//                'pattern' => $this->id,
//                'route' => $this->id . '/default/index'
//            ],
//        ], false);
//
//
//        $app->setModules($this->g_modules);
//        $app->setComponents($this->g_components);
//        die(var_dump($app->getModules()));
        // TODO: fixed this shit

    }
}