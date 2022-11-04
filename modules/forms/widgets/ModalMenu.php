<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
use yii\helpers\Html;

class ModalMenu extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

//        $model = new \app\modules\forms\models\CallBackForm;
//        return ($this->type == 'modal') ? $this->render('call_back_modal', [
//                    'model' => $model,
//                ]) : $this->render('call_back', [
//                    'model' => $model,
//        ]);


        echo $this->render('modal_menu');
    }

}
