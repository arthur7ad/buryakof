<?php

namespace app\modules\autopark\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\page\models\Page;

class Slider extends Widget {

    public function run() {

        \app\modules\autopark\ModuleAssets::register($this->view);

        $model = \app\modules\autopark\models\Autopark::find()
                ->orderBy(['order' => SORT_DESC])
                ->all();

        return $this->render('slider', ['model' => $model]);
    }

}
