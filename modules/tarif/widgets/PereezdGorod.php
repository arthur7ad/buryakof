<?php

namespace app\modules\tarif\widgets;

use yii\base;
use yii\base\Widget;
use \app\modules\tarif\models\Tarif;
use app\modules\tarif\Assets;

class PereezdGorod extends Widget {

    public function run() {

        Assets::register($this->view);

        $gorod = Tarif::findOne(['sys_name' => 'pereezd_gorod']);

        return $this->render('pereezd_gorod', [
                    'gorod' => $gorod,
        ]);
    }

}
