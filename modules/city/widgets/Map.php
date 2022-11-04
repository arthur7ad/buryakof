<?php

namespace app\modules\city\widgets;

use Yii;
use yii\base;
use yii\helpers\Html;
use yii\base\Widget;
use app\modules\city\models\City;
use app\modules\city\Assets;

class Map extends Widget {

    public function run() {

        Assets::register($this->view);

        $model = City::findAll(['is_enable' => 1]);

        return $this->render('map', ['model' => $model]);
    }

}
