<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $city
 * @property string $content Отзыв
 * @property string $date Дата
 * @property string $image Изображение благодарности
 * @property string $avatar Лого/Аватарка
 * @property int $is_enable Включён
 * @property int $type_id Тип услуги
 */
class Review extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'content'], 'required'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['is_enable', 'type_id'], 'integer'],
            [['name', 'city'], 'string', 'max' => 255],
            [['image', 'avatar'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'city' => 'City',
            'content' => 'Отзыв',
            'date' => 'Дата',
            'image' => 'Изображение благодарности',
            'avatar' => 'Лого/Аватарка',
            'is_enable' => 'Включён',
            'type_id' => 'Тип услуги',
        ];
    }
}
