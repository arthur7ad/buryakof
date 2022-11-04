<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "page_content".
 *
 * @property int $id
 * @property string $header Заголовок
 * @property string $content
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $created_at
 * @property string $updated_at
 * @property int $is_enable Включёно
 * @property int $city_id
 * @property int $page_id
 * @property string $slide_title Заголовок слайда
 * @property string $slide_description Описание слайда
 * @property string $content_bottom Дополнительный конент
 */
class PageContent extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['header', 'city_id'], 'required'],
            [['content', 'content_bottom'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['is_enable', 'city_id', 'page_id'], 'integer'],
            [['header', 'slide_title', 'slide_description'], 'string', 'max' => 255],
            [['title', 'description', 'keywords'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'header' => 'Заголовок',
            'content' => 'Content',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_enable' => 'Включёно',
            'city_id' => 'City ID',
            'page_id' => 'Page ID',
            'slide_title' => 'Заголовок слайда',
            'slide_description' => 'Описание слайда',
            'content_bottom' => 'Дополнительный конент',
        ];
    }
}
