<?php

namespace app\models;

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
class Slider extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['system_name', 'description'], 'required'],
            [['system_name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'system_name' => 'Системное имя',
            'description' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSliderItems()
    {
        return $this->hasMany(SliderItem::className(), ['slider_id' => 'id']);
    }
}
