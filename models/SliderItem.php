<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slider_item".
 *
 * @property int $id
 * @property string $name
 * @property string $image Изображение
 * @property string $top_title Жёлтый заголовок
 * @property string $title Заголовок
 * @property string $description Описание
 * @property int $is_enable Включено
 * @property int $ord
 * @property string $create_time
 * @property string $update_time
 * @property int $slider_id
 *
 * @property SlidePage[] $slidePages
 * @property Slider $slider
 * @property SliderItem $sliderItem
 */
class SliderItem extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'title'], 'required'],
            [['is_enable', 'ord', 'slider_id'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['name', 'image', 'top_title', 'title', 'description'], 'string', 'max' => 255],
            [['slider_id'], 'exist', 'skipOnError' => true, 'targetClass' => Slider::className(), 'targetAttribute' => ['slider_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Изображение',
            'top_title' => 'Жёлтый заголовок',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'is_enable' => 'Включено',
            'ord' => 'Ord',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'slider_id' => 'Slider ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlidePages()
    {
        return $this->hasMany(SlidePage::className(), ['slide_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlider()
    {
        return $this->hasOne(Slider::className(), ['id' => 'slider_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSliderItemCities()
    {
        return $this->hasMany(SliderItemCity::className(), ['slider_item_id' => 'id']);
    }
}
