<?php

namespace app\modules\feedback\widgets;

use app\modules\feedback\models\Feedback;
use yii\base\Widget;
use app\modules\feedback\Assets;

class Slider extends Widget {

    public $feedback;

    public function run() {

        Assets::register($this->view);

        $model = Feedback::findOne($this->feedback);

        return $this->render('slider', ['model' => $model]);
    }

}
