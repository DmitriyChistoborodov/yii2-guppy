<?php
namespace xbrodies\guppy\controllers;

use yii\web\Controller;

/**
 * Developer: skillet123q@gmail.com
 * Date: 14.08.2017
 * Time: 16:37
 */
class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render("index.twig");
    }
}