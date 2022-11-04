<?php

namespace app\modules\user\widgets;

use yii\base;
use yii\base\Widget;

class LoginPopup extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        $model = new \app\modules\user\models\LoginForm;

        return $this->render('login_popup'
                        , ['model' => $model]
        );
    }

}
