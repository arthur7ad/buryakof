<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "distance".
 *
 * @property int $id
 * @property string $from
 * @property string $to
 * @property int $distance
 */
class Distance extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'distance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from', 'to'], 'required'],
            [['distance'], 'integer'],
            [['from', 'to'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'From',
            'to' => 'To',
            'distance' => 'Distance',
        ];
    }
}
