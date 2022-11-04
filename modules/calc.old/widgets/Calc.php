<?php

namespace app\modules\calc\widgets;

use Yii;
use yii\base;
use yii\helpers\Html;
use yii\base\Widget;

class Calc extends Widget {

    public function run() {

        \app\modules\calc\Assets::register(Yii::$app->view);

        $model = new \app\modules\calc\models\CalcForm();

        $model->type_tc = '1';
        $model->type_load = '0';
        $model->tonnazh = '18';
        $model->prim = '1';

        $result = $this->render('calc', ['model' => $model]);

        /*
         * Убираем autocomplete="off"
         */

        return str_replace('autocomplete="off"', '', $result);
    }

}
