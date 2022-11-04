<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "robots".
 *
 * @property int $id
 * @property int $city_id Город
 * @property string $content Содержание
 */
class Robots extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'robots';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id'], 'required'],
            [['city_id'], 'integer'],
            [['content'], 'string'],
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
            'content' => 'Содержание',
        ];
    }
}
