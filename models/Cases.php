<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cases".
 *
 * @property int $id
 * @property string $image Изображение
 */
class Cases extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cities', 'galery'], 'safe'],
            [['id', 'url_id'], 'integer'],
            [['image', 'name'], 'string', 'max' => 255],
            [['description'], 'string']
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
            'description' => 'Описание',
            'url_id' => 'URL'
        ];
    }
}
