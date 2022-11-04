<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
use yii\helpers\Html;

class BlanketOrder extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        $model = new \app\modules\forms\models\BlanketOrder;

        return $this->render('blanket_order', [
                    'model' => $model,
        ]);
    }

}
