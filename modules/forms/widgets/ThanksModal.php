<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
use yii\helpers\Html;

class ThanksModal extends Widget {

    public function run() {


        return $this->render('thanks_modal');
    }

}
