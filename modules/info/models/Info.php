<?php

namespace app\modules\info\models;

use Yii;

class Info extends \app\models\InfoBlock {

    public static function get($sys_name) {

        $model = self::findOne(['name' => $sys_name]);

        if ($model) {
            $model->replaceSeo();
            return $model->value;
        } else
            return '';
    }

}
