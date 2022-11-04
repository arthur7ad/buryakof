<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "utp".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $description Описание
 * @property int $order Порядок
 * @property int $is_enable Включено
 */
class Utp extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'utp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['order', 'is_enable'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
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
            'description' => 'Описание',
            'order' => 'Порядок',
            'is_enable' => 'Включено',
        ];
    }
}
