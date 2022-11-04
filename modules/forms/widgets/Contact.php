<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
use yii\helpers\Html;

class Contact extends Widget {

    public $title = 'Форма обратной связи';

    public function run() {

        $model = new \app\modules\forms\models\ContactForm();

        return $this->render('contact_form', [
                    'model' => $model,
                    'title' => $this->title,
        ]);
    }

}
