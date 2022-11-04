<?php

namespace app\modules\tarif\models;

use Yii;


class Tarif extends \app\models\Tarif {

    public function getTarifItems() {
        return $this->hasMany(TarifItem::className(), ['tarif_id' => 'id']);
    }

}
