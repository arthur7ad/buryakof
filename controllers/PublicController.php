<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class PublicController extends Controller {

    public function beforeAction($action) {

        Yii::$app->helper->is_public = true;

        return parent::beforeAction($action);
    }

//    public function afterAction($action, $result) {
//        
//        Yii::error(123);
//
//
//        if (!Yii::$app->view->title)
//            Yii::$app->view->title = '123';
//
//        return parent::afterAction($action, $result);
//    }

}
