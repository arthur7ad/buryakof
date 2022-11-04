<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
use yii\helpers\Html;

class CalcModal extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        $model = new \app\modules\forms\models\CalcOrderForm();

        return $this->render('calc', [
                    'model' => $model,
                ])
        ;
    }

}
