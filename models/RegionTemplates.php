<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region_templates".
 *
 * @property int $id
 * @property int $city_id Город
 * @property string $name Имя шаблона
 * @property string $value Значение
 * @property string $url Url
 * @property string $domain Домен
 * @property string $ad Рекламная компания
 *
 * @property City $city
 */
class RegionTemplates extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region_templates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'name'], 'required'],
            [['city_id'], 'integer'],
            [['value'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['url'], 'string', 'max' => 500],
            [['domain', 'ad'], 'string', 'max' => 100],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'Город',
            'name' => 'Имя шаблона',
            'value' => 'Значение',
            'url' => 'Url',
            'domain' => 'Домен',
            'ad' => 'Рекламная компания',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}
