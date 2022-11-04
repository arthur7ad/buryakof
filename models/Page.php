<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string $created_at Дата создания
 * @property string $name Короткое название (для крошек)
 * @property string $header Заголовок
 * @property string $content Содержание
 * @property string $content_seo_1 SEO текст 1
 * @property string $content_seo_2 SEO текст 2
 * @property int $url_id Url
 * @property int $parent_id Родитель
 * @property int $order Порядок
 * @property int $is_enable Включено
 * @property string $template Шаблон
 * @property string $subdomain Поддомен
 *
 * @property Url $url
 * @property Url $url0
 * @property PageCityContent[] $pageCityContents
 * @property SlidePage[] $slidePages
 */
class Page extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at','cases','galery','feedback'], 'safe'],
            [['header'], 'required'],
            [['content', 'content_seo_1', 'content_seo_2'], 'string'],
            [['url_id', 'parent_id', 'order', 'is_enable', 'has_clients'], 'integer'],
            [['name', 'template'], 'string', 'max' => 255],
            [['header'], 'string', 'max' => 1000],
            [['subdomain'], 'string', 'max' => 50],
            [['url_id'], 'exist', 'skipOnError' => true, 'targetClass' => Url::className(), 'targetAttribute' => ['url_id' => 'id']],
            [['url_id'], 'exist', 'skipOnError' => true, 'targetClass' => Url::className(), 'targetAttribute' => ['url_id' => 'id']],
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
            'name' => 'Короткое название (для крошек)',
            'header' => 'Заголовок',
            'content' => 'Содержание',
            'content_seo_1' => 'SEO текст 1',
            'content_seo_2' => 'SEO текст 2',
            'url_id' => 'Url',
            'parent_id' => 'Родитель',
            'order' => 'Порядок',
            'is_enable' => 'Включено',
            'template' => 'Шаблон',
            'subdomain' => 'Поддомен',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUrl()
    {
        return $this->hasOne(Url::className(), ['id' => 'url_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUrl0()
    {
        return $this->hasOne(Url::className(), ['id' => 'url_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageCityContents()
    {
        return $this->hasMany(PageCityContent::className(), ['page_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlidePages()
    {
        return $this->hasMany(SlidePage::className(), ['page_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGaleryblock()
    {
        return $this->hasOne(Galery::className(), ['id' => 'galery']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbackblock()
    {
        return $this->hasOne(Feedback::className(), ['id' => 'feedback']);
    }
}
