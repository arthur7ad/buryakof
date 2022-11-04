<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slider_item_city".
 *
 * @property int $id
 * @property int $slider_item_id
 * @property int $city_id
 * @property string $top_title Жёлтый заголовок
 * @property string $title Заголовок
 * @property string $description Описание
 * @property int $is_enable Включено
 *
 * @property SliderItem $sliderItem
 */
class SliderItemCity extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider_item_city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_enable',], 'integer'],
            [['city_id',], 'required'],
            ['city_id', 'unique', 'targetAttribute' => ['city_id', 'slider_item_id']],
            [['top_title', 'title', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'Город',
            'name' => 'Name',
            'top_title' => 'Жёлтый заголовок',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'is_enable' => 'Включено',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSliderItem()
    {
        return $this->hasOne(SliderItem::className(), ['id' => 'slider_item_id']);
    }
}
