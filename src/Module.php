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
use yii\i18n\PhpMessageSource;

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
        'user' => [

            'class' => 'dektrium\user\Module',

            // If this option is set to true, module will show flash messages
            // using integrated widget. Otherwise you will need to handle it
            // using your own widget, like provided in yii advanced template.
            // The keys for those messages are success, info, danger, warning.
            'enableFlashMessages' => true,

            // If this option is set to false, users will not be able to register
            // an account. Registration page will throw HttpNotFoundException.
            // However confirmation will continue working and you as an administrator
            // will be able to create an account for user from admin interface.
            'enableRegistration' => true,

            // If this option is set to true, password field on registration page
            // will be hidden and password for user will be generated automatically.
            // Generated password will be 8 characters long and will be sent to user via email.
            'enableGeneratingPassword' => false,

            // If this option is set to true, module sends email that contains a confirmation
            // link that user must click to complete registration.
            'enableConfirmation' => true,

            // If this option is to true, users will be able to log in even though
            // they didn't confirm his account.
            'enableUnconfirmedLogin' => false,

            // If this option is to true, users will be able to recovery their forgotten passwords.
            'enablePasswordRecovery' => true,

            // If this option is to true, users will be able to completely delete their accounts.
            'enableAccountDelete' => false,

            // When user tries change his password, there are three ways how this change will happen:
            // - STRATEGY_DEFAULT This is default strategy. Confirmation message
            // will be sent to new user's email and user must click confirmation link.
            // - STRATEGY_INSECURE Email will be changed without any confirmation.
            // - STRATEGY_SECURE Confirmation messages will be sent to both new and old user's
            // email addresses and user must click both confirmation links.
            'emailChangeStrategy' => \dektrium\user\Module::STRATEGY_DEFAULT,

            // The time in seconds before a confirmation token becomes invalid.
            // After expiring this time user have to request new confirmation token on special page.
            'confirmWithin' => 86400,

            // The time in seconds you want the user will be remembered without asking for credentials.
            'rememberFor' => 1209600,

            // The time in seconds before a recovery token becomes invalid.
            // After expiring this time user have to request new recovery message.
            'recoverWithin' => 21600,

            // Yii2-user has special admin pages where you can manager registered users
            // or create new user accounts. You can specify the username of users that
            // will be able to access those pages. The most permissive of admins and
            // adminPermission will determine access.
            'admins' => [],

            // Yii2-user has special admin pages where you can manager registered
            // users or create new user accounts. You can specify the existing RBAC
            // permission that will allow a user to be able to access those pages.
            // The most permissive of admins and adminPermission will determine access.
            'adminPermission' => null,

            // Cost parameter used by the Blowfish hash algorithm. The higher the value
            // of cost, the longer it takes to generate the hash and to verify a password
            // against it. Higher cost therefore slows down a brute-force attack. For best
            // protection against brute for attacks, set it to the highest value that is tolerable
            // on production servers. The time taken to compute the hash doubles for every increment
            // by one of cost.
            'cost' => 10,

            // The prefix for user module URL. By changing this value you will be
            // able to chage url prefix used by module. For example if you set it to
            // auth, then all urls will loke like auth/login, auth/admin, auth/register, etc.
            'urlPrefix' => 'user',

            // The rules to be used in URL management.
            'urlRules' => []
        ]
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
        $app->setModules($this->g_modules);
        $app->setComponents($this->g_components);
        $app->bootstrap = '\dektrium\user\Bootstrap';
//        $daw = new \dektrium\user\Bootstrap();
//        $daw->bootstrap($app);
    }


}