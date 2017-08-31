<?php
namespace xbrodies\guppy\controllers;

use xbrodies\guppy\models\Page;
use Yii;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;

/**
 * Developer: skillet123q@gmail.com
 * Date: 14.08.2017
 * Time: 16:37
 */
class DefaultController extends Controller
{
    public $layout = "base.twig";

    public function actionIndex()
    {
        return $this->render('index.twig');
    }
}