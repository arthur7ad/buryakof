<?php

namespace app\modules\clients\widgets;

use Yii;
use yii\base;
use yii\helpers\Html;
use yii\base\Widget;
use app\modules\clients\Assets;
use app\modules\clients\models\Clients;

class Slider extends Widget {

    public function run() {

        Assets::register($this->view);

        $model = Clients::find()->all();

        return $this->render('slider', ['model' => $model]);
    }

}
