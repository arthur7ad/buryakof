<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "url".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $url
 *
 * @property Page[] $pages
 * @property Page[] $pages0
 */
class Url extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'url';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'url'], 'required'],
            [['title', 'description', 'keywords', 'url'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'url' => 'Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(Page::className(), ['url_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages0()
    {
        return $this->hasMany(Page::className(), ['url_id' => 'id']);
    }
}
