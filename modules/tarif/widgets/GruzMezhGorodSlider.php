<?php

namespace app\modules\tarif\widgets;

use yii\base;
use yii\base\Widget;
use \app\modules\tarif\models\Tarif;
use app\modules\tarif\Assets;

class GruzMezhGorodSlider extends Widget {

    public function run() {

        Assets::register($this->view);

        $gorod = Tarif::findOne(['sys_name' => 'perevozki_mezgorod']);

        return $this->render('gruz_mezhgorod_slider', [
                    'gorod' => $gorod,
        ]);
    }

}
