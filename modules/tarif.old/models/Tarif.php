<?php

namespace app\modules\tarif\models;

use Yii;

class Tarif extends \app\models\Tarif {

    public function getFromCity() {
        return $this->hasOne(\app\modules\city\models\City::className(), ['id' => 'from_id']);
    }

    public function getToCity() {
        return $this->hasOne(\app\modules\city\models\City::className(), ['id' => 'to_id']);
    }

}
