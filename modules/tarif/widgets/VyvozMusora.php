<?php

namespace app\modules\tarif\widgets;

use yii\base;
use yii\base\Widget;
use \app\modules\tarif\models\Tarif;
use app\modules\tarif\Assets;

class 	VyvozMusora extends Widget {

    public function run() {

        Assets::register($this->view);

        $model = Tarif::findOne(['sys_name' => 'vyvoz_musora']);

        return $this->render('vyvoz_musora', [
                    'model' => $model,
        ]);
    }

}
