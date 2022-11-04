<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $created_at Дата создания
 * @property string $header Заголовок
 * @property string $content Содержание
 * @property int $url_id Url
 * @property string $city
 */
class Article extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'city'], 'safe'],
            [['header'], 'required'],
            [['content'], 'string'],
            [['url_id'], 'integer'],
            [['header'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Дата создания',
            'header' => 'Заголовок',
            'content' => 'Содержание',
            'url_id' => 'Url',
            'city' => 'Города'
        ];
    }
}
