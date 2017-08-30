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
    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization");
        $pages = Page::find()->asArray(true)->all();

        return $pages;
    }
}