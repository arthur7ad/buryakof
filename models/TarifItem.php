<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tarif_item".
 *
 * @property int $id
 * @property int $tarif_id Тариф
 * @property string $name Имя
 * @property string $price Цена
 * @property string $text1 Текст 1
 * @property string $text2 Текст2
 * @property string $text3 Текст3
 * @property string $image Изображение
 * @property int $is_akcia Акции
 * @property string $alt Alt
 *
 * @property Tarif $tarif
 */
class TarifItem extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tarif_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tarif_id', 'is_akcia'], 'integer'],
            [['text1', 'text2', 'text3'], 'string'],
            [['name', 'price', 'image'], 'string', 'max' => 255],
            [['alt'], 'string', 'max' => 500],
            [['tarif_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tarif::className(), 'targetAttribute' => ['tarif_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tarif_id' => 'Тариф',
            'name' => 'Имя',
            'price' => 'Цена',
            'text1' => 'Текст 1',
            'text2' => 'Текст2',
            'text3' => 'Текст3',
            'image' => 'Изображение',
            'is_akcia' => 'Акции',
            'alt' => 'Alt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarif()
    {
        return $this->hasOne(Tarif::className(), ['id' => 'tarif_id']);
    }
}
