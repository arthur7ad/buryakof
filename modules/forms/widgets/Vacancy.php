<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
use yii\helpers\Html;

class Vacancy extends Widget {

    public $type = '';

    public function init() {

        parent::init();
    }

    public function run() {

        $model = new \app\modules\forms\models\Vacancy;

        return $this->render('vacancy', [
                    'model' => $model,
        ]);
    }

}
