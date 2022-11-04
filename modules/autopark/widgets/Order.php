<?php

namespace app\modules\autopark\widgets;

use yii\base;
use yii\base\Widget;
use yii\helpers\Html;

class Order extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        $model = new \app\modules\autopark\models\Order;

        return $this->render('order', [
                    'model' => $model,
        ]);
    }

}
