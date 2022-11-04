<?php

namespace app\modules\cases\widgets;

use Yii;
use yii\base;
use yii\helpers\Html;
use yii\base\Widget;
use app\modules\cases\Assets;
use app\modules\cases\models\Cases;

class Slider extends Widget {

    public $items;

    public function run() {

        Assets::register($this->view);

        $model = Cases::findAll($this->items);

        return $this->render('slider', ['model' => $model]);
    }

}
