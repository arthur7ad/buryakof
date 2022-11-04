<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "page_city_content".
 *
 * @property int $id
 * @property int $city_id Город
 * @property int $page_id Страница
 * @property string $content Содержание
 * @property string $content_seo_1 SEO 1
 * @property string $content_seo_2 SEO 2
 * @property string $header Заголовок
 * @property string $title
 * @property string $description
 *
 * @property City $city
 * @property Page $page
 */
class PageCityContent extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page_city_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['cases', 'safe'],
            [['city_id', 'page_id'], 'integer'],
            [['content', 'content_seo_1', 'content_seo_2'], 'string'],
            [['header'], 'string', 'max' => 1000],
            [['title', 'description'], 'string', 'max' => 500],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['page_id' => 'id']],
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
            'page_id' => 'Страница',
            'content' => 'Содержание',
            'content_seo_1' => 'SEO 1',
            'content_seo_2' => 'SEO 2',
            'header' => 'Заголовок',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'page_id']);
    }
}
