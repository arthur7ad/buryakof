<?php

namespace app\modules\slider\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $system_name Системное имя
 * @property string $description Описание
 *
 * @property SliderItem[] $sliderItems
 */
class Slider extends \app\models\Slider {

    public function getCount() {

        return count($this->sliderItems);
    }

    public function getSliderItems() {
        return $this->hasMany(SliderItem::className(), ['slider_id' => 'id']);
    }

}
