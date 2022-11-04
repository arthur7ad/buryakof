<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $image Изображение
 */
class Clients extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['image', 'name'], 'string', 'max' => 255],
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
            'image' => 'Изображение',
        ];
    }
}
