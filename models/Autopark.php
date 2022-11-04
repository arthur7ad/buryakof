<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autopark".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $image Изображение
 * @property string $length Длина
 * @property string $height Высота
 * @property string $weight Ширина
 * @property string $for Подходит для
 * @property string $description Описание
 * @property int $order Порядок
 * @property int $is_enable Включёно
 * @property int $volume Объём
 * @property double $carrying Грузоподъёмность
 * @property int $price Цена
 * @property int $type
 * @property int $price_tarif1 Цена в час по городу
 * @property int $price_tarif2 Цена в час по пригороду
 * @property int $price_km_oblast Цена за км область
 * @property int $price_km_country Стоимость км Россия
 */
class Autopark extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autopark';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['for', 'description'], 'string'],
            [['order', 'is_enable', 'volume', 'price', 'type', 'price_tarif1', 'price_tarif2', 'price_km_oblast', 'price_km_country'], 'integer'],
            [['carrying'], 'number'],
            [['name', 'image'], 'string', 'max' => 255],
            [['length', 'height', 'weight'], 'string', 'max' => 10],
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
            'length' => 'Длина',
            'height' => 'Высота',
            'weight' => 'Ширина',
            'for' => 'Подходит для',
            'description' => 'Описание',
            'order' => 'Порядок',
            'is_enable' => 'Включёно',
            'volume' => 'Объём',
            'carrying' => 'Грузоподъёмность',
            'price' => 'Цена',
            'type' => 'Type',
            'price_tarif1' => 'Цена в час по городу',
            'price_tarif2' => 'Цена в час по пригороду',
            'price_km_oblast' => 'Цена за км область',
            'price_km_country' => 'Стоимость км Россия',
        ];
    }
}
