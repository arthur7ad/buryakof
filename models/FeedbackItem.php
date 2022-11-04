<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "FeedbackItem".
 *
 * @property int $id
 * @property string $image Изображение
 */
class FeedbackItem extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','feedback_id'], 'integer'],
            [['name', 'text', 'image', 'youtube'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя отзыва',
            'image' => 'Фото отзыва',
            'text' => 'Текст отзыва',
            'youtube' => 'Отзыв на youtube',
        ];
    }


    public function getImg()
    {
        return '/image/upload/' . $this->image;
    }
}
