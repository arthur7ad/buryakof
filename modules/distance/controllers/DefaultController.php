<?php

namespace app\modules\distance\controllers;

use Yii;
use yii\web\Controller;
use app\modules\distance\models\Distance;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

    public function actionIndex() {

//        return $this->render('index', [
//        ]);
    }

    public function actionGetDistance($from, $to) {

        $model = \app\models\Distance::find()
                ->where(['from' => $from, 'to' => $to])
                ->one();

        if ($model && isset($model->distance) && $model->distance)
            return $model->distance;

        return false;
    }

    public function actionAdd($from, $to, $distance) {


        $model = new Distance;
        $model->from = $from;
        $model->to = $to;
        $model->distance = $distance;
        $model->save();

        return true;
    }

}
