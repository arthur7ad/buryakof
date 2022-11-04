<?php

namespace app\modules\robots\models;

use Yii;

class Robots extends \app\models\Robots {

    public function getCity() {
        return $this->hasOne(\app\modules\city\models\City::className(), ['id' => 'city_id']);
    }

}
