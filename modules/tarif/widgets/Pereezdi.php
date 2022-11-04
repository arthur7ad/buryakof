<?php

namespace app\modules\tarif\widgets;

use yii\base;
use yii\base\Widget;
use \app\modules\tarif\models\Tarif;
use app\modules\tarif\Assets;

class Pereezdi extends Widget {

    public function run() {

        Assets::register($this->view);

        $mezh = Tarif::findOne(['sys_name' => 'pereezd_mezgorod']);
        $gorod = Tarif::findOne(['sys_name' => 'pereezd_gorod']);

        return $this->render('pereezdi', [
                    'mezh' => $mezh,
                    'gorod' => $gorod,
        ]);
    }

}
