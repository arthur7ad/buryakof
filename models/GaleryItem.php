<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "GaleryItem".
 *
 * @property int $id
 * @property string $image Изображение
 */
class GaleryItem extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'galery_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','galery_id'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название элемента галереи',
            'image' => 'Фото элемента галереи',
        ];
    }
}
