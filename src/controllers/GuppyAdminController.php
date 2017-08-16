<?php
namespace xbrodies\guppy\controllers;

use yii\web\Controller;

/**
 * Developer: skillet123q@gmail.com
 * Date: 14.08.2017
 * Time: 16:37
 */
class GuppyAdminController extends Controller
{
    public $layout = "base.twig";

    public function actionIndex()
    {
        return $this->render("dw.twig");
    }

    public function actionLogin()
    {

    }
}