<?php

namespace app\modules\calc\widgets;

use Yii;
use yii\base;
use yii\helpers\Html;
use yii\base\Widget;

class CalcLocal extends Widget {

    public function run() {

        \app\modules\calc\Assets::register(Yii::$app->view);

        $model = new \app\modules\calc\models\CalcLocalForm();

        $model->type_tc = '20';
        $model->type_load = '1000';
        $model->tonnazh = '0';
        $model->prim = '1';


        $result = $this->render('calc_local', ['model' => $model]);
        /*
         * Убираем autocomplete="off"
         */
        return str_replace('autocomplete="off"', '', $result);
    }

}
