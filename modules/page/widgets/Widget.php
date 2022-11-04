<?php

namespace app\modules\_foo\widgets;

use Yii;
use yii\base;
use yii\helpers\Html;
use yii\base\Widget;

class Map extends Widget {

    public function run() {

        Assets::register($this->view);

        $model = Model::findAll(['is_enable' => 1]);

        return $this->render('widget', ['model' => $model]);
    }

}
