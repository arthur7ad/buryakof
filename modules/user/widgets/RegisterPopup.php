<?php

namespace app\modules\user\widgets;

use yii\base;
use yii\base\Widget;

class RegisterPopup extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        $model = new \app\modules\user\models\SignupForm;

        return $this->render('register_popup'
                        , ['model' => $model]
        );
    }

}
