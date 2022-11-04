<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portfolio".
 *
 * @property int $id
 * @property string $name Название
 * @property string $date Дата
 * @property string $anons Анонс
 * @property string $image Изображение
 */
class Portfolio extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'portfolio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['date'], 'safe'],
            [['name', 'image'], 'string', 'max' => 255],
            [['anons'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'date' => 'Дата',
            'anons' => 'Анонс',
            'image' => 'Изображение',
        ];
    }
}
