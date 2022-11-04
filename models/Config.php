<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "config".
 *
 * @property string $name Системное имя
 * @property string $comment Комментарий
 * @property string $value Значение
 * @property int $type Тип
 */
class Config extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['value'], 'string'],
            [['type'], 'integer'],
            [['name', 'comment'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Системное имя',
            'comment' => 'Комментарий',
            'value' => 'Значение',
            'type' => 'Тип',
        ];
    }
}
