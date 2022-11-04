<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string $name Город
 * @property string $name_eng Uri
 * @property string $latitude Широта
 * @property string $longitude Долгота
 * @property int $is_enable Включен
 * @property int $is_default
 * @property string $oblast {oblast}
 * @property string $atcity {atcity}
 * @property string $incity  {incity}
 * @property string $prilagat {prilagat}
 * @property string $phones Телефоны
 *
 * @property PageCityContent[] $pageCityContents
 * @property RegionTemplates[] $regionTemplates
 */
class City extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'name_eng', 'latitude', 'longitude'], 'required'],
            [['is_enable', 'is_default'], 'integer'],
            [['name', 'name_eng', 'latitude', 'longitude', 'oblast', 'atcity', 'incity', 'prilagat', 'phones'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Город',
            'name_eng' => 'Uri',
            'latitude' => 'Широта',
            'longitude' => 'Долгота',
            'is_enable' => 'Включен',
            'is_default' => 'Is Default',
            'oblast' => '{oblast}',
            'atcity' => '{atcity}',
            'incity' => ' {incity}',
            'prilagat' => '{prilagat}',
            'phones' => 'Телефоны',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageCityContents()
    {
        return $this->hasMany(PageCityContent::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegionTemplates()
    {
        return $this->hasMany(RegionTemplates::className(), ['city_id' => 'id']);
    }
}
