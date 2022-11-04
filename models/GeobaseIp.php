<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "geobase_ip".
 *
 * @property int $ip_begin
 * @property int $ip_end
 * @property string $country_code
 * @property int $city_id
 */
class GeobaseIp extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'geobase_ip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip_begin', 'ip_end', 'country_code', 'city_id'], 'required'],
            [['ip_begin', 'ip_end', 'city_id'], 'integer'],
            [['country_code'], 'string', 'max' => 2],
            [['ip_begin'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ip_begin' => 'Ip Begin',
            'ip_end' => 'Ip End',
            'country_code' => 'Country Code',
            'city_id' => 'City ID',
        ];
    }
}
