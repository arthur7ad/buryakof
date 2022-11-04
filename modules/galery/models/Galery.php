<?php

namespace app\modules\galery\models;

use yii\helpers\ArrayHelper;

class Galery extends \app\models\Galery {

    public static function getGaleries()
    {

        $array = ArrayHelper::map(Galery::find()->all(), 'id', 'name');

        return [ 0 => 'Без галереи'] + $array;
    }
}
