<?php
/**
 * Developer: skillet123q@gmail.com
 * Date: 18.08.2017
 * Time: 14:28
 */

namespace xbrodies\guppy;

use yii\base\BootstrapInterface;
use yii\helpers\ArrayHelper;

class Module extends \yii\base\Module implements BootstrapInterface
{
    public $controllerNamespace = 'xbrodies\guppy\controllers';

    public $g_components;

    public $g_modules;

    public function __construct($id, $parent = null, array $config = [])
    {
        // Merge default configurations with override
        $config['g_modules'] = ArrayHelper::merge($this->g_modules, include("config/modules.php"));
        $config['g_components'] = ArrayHelper::merge($this->g_components, include("config/components.php"));

        parent::__construct($id, $parent, $config);
    }

    public function bootstrap($app)
    {
        // path to dashboard. Single page
        $app->getUrlManager()->addRules([
            [
                'class' => 'yii\web\UrlRule',
                'pattern' => $this->id,
                'route' => $this->id . '/default/index'
            ],
        ], false);

        $app->setModules($this->g_modules);
        $app->setComponents($this->g_components);

        // TODO: fixed this shit
        $daw = new \dektrium\user\Bootstrap();
        $daw->bootstrap($app);
    }
}