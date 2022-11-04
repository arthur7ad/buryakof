<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "geobase_region".
 *
 * @property int $id
 * @property string $name
 */
class GeobaseRegion extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'geobase_region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}
