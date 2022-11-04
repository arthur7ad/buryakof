<?php

namespace app\modules\autopark\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\page\models\Page;

class CalcSlider extends Widget {

    public function run() {

        $model = \app\modules\autopark\models\Autopark::find()
                ->orderBy(['order' => SORT_DESC])
                ->where(['is_enable' => 1])
                ->all();

        return $this->render('calc_slider', ['model' => $model]);
    }

}
