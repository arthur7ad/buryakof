<?php

namespace app\modules\feedback\models;

use yii\helpers\ArrayHelper;

class Feedback extends \app\models\Feedback {

    public static function getFeedbacks()
    {
        $array = ArrayHelper::map(Feedback::find()->all(), 'id', 'name');
        return [0 => 'Без отзывов'] +  $array;
    }
}
