<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slide_page".
 *
 * @property int $id
 * @property int $slide_id Слайд
 * @property int $page_id Страница
 *
 * @property Page $page
 * @property SliderItem $slide
 */
class SlidePage extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slide_page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slide_id', 'page_id'], 'integer'],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['page_id' => 'id']],
            [['slide_id'], 'exist', 'skipOnError' => true, 'targetClass' => SliderItem::className(), 'targetAttribute' => ['slide_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slide_id' => 'Слайд',
            'page_id' => 'Страница',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'page_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlide()
    {
        return $this->hasOne(SliderItem::className(), ['id' => 'slide_id']);
    }
}
