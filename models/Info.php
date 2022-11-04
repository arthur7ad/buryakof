<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "info".
 *
 * @property int $id
 * @property string $name Систимное имя
 * @property string $label Описание
 * @property string $value Значение
 */
class Info extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'label'], 'required'],
            [['value'], 'string'],
            [['name', 'label'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Систимное имя',
            'label' => 'Описание',
            'value' => 'Значение',
        ];
    }
}
