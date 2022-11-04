<?php

namespace app\modules\portfolio\widgets;

use Yii;
use yii\base;
use yii\helpers\Html;
use yii\base\Widget;
use app\modules\portfolio\Assets;
use app\modules\portfolio\models\Portfolio;

class Slider extends Widget {

    public function run() {

        Assets::register($this->view);

        $model = Portfolio::find()->all();

        return $this->render('slider', ['model' => $model]);
    }

}
