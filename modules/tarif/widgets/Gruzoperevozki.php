<?php

namespace app\modules\tarif\widgets;

use yii\base;
use yii\base\Widget;
use \app\modules\tarif\models\Tarif;
use app\modules\tarif\Assets;

class Gruzoperevozki extends Widget {

    public function run() {

        Assets::register($this->view);

        $mezh = Tarif::findOne(['sys_name' => 'perevozki_mezgorod']);
        $gorod = Tarif::findOne(['sys_name' => 'perevozki_gorod']);

        return $this->render('gruzoperevozki', [
                    'mezh' => $mezh,
                    'gorod' => $gorod,
        ]);
    }

}
