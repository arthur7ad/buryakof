<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "galery".
 *
 * @property int $id
 * @property string $image Изображение
 */
class Galery extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'galery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название галереи',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(GaleryItem::className(), ['galery_id' => 'id']);
    }


}
