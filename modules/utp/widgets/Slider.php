<?php

namespace app\modules\utp\widgets;

use Yii;
use yii\base;
use yii\helpers\Html;
use yii\base\Widget;
use app\modules\utp\Assets;
use app\modules\utp\models\Utp;

class Slider extends Widget {

    public function run() {

        Assets::register($this->view);

        $model = Utp::find()->where(['is_enable' => 1])
                ->orderBy(['order' => SORT_DESC])
                ->all();

        return $this->render('slider', ['model' => $model]);
    }

}
