<?php

namespace app\modules\cases\models;

use app\models\Galery;
use app\modules\city\models\City;
use app\modules\url\models\Url;
use vova07\fileapi\behaviors\UploadBehavior;
use Yii;
use yii\helpers\ArrayHelper;

class Cases extends \app\models\Cases {

    public function beforeSave($insert) {

        if ($this->isNewRecord) {
            $url = new \app\modules\url\models\Url;
            $url->title = $url->title;
            $url->url = \app\components\Translite::str2url($url->title);
            if ($url->save())
                $this->url_id = $url->id;
        }
        $this->cities = $this->cities ? implode(',', $this->cities) : '';
        return parent::beforeSave($insert);
    }

    public function afterFind() {

//        $this->content = html_entity_decode($this->content);
        $this->cities = explode(',', $this->cities);
        return parent::afterFind();
    }

    public function behaviors() {
        return [
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'image' => [
                        'path' => '@webroot/image/upload',
                        'tempPath' => '@webroot/image/upload',
                        'url' => '/image/upload/'
                    ],
                ]
            ],
        ];
    }

    public function getImg() {
        return '/image/upload/' . $this->image;
    }

    public static function getCases() {

        return ArrayHelper::map(Cases::find()->all(), 'id', 'name');
    }

    public function getUrl() {
        return $this->hasOne(Url::className(), ['id' => 'url_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGaleryblock()
    {
        return $this->hasOne(Galery::className(), ['id' => 'galery']);
    }
}
