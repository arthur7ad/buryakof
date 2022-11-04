<?php

namespace app\modules\city\widgets;

use Yii;
use yii\base;
use yii\helpers\Html;
use yii\base\Widget;
use app\modules\city\models\City;

class CityChoice extends Widget {

    public function run() {

        \app\modules\city\Assets::register($this->view);

        $cityes = City::find()->where(
                                ['is_enable' => 1])
                        ->orderBy(['name' => SORT_ASC])->all();

        foreach ($cityes as $item):
//            Yii::error(substr($item->name, 0, 2));
            $arr[substr($item->name, 0, 2)][] = $item;
        endforeach;
//            $arr[$item->name[0]][] = $item;
//        Yii::error($arr);
//        $arr = [];

        return $this->render('city_choice', [
//                    'model' => array_chunk($cityes, 4),
                    'arr' => $arr,
                    'current_city' => City::getCityNameByCode(Yii::$app->city->current_city),
                        ]
        );
    }

}
