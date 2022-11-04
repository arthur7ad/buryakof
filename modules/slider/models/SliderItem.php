<?php

namespace app\modules\slider\models;

use Yii;
use vova07\fileapi\behaviors\UploadBehavior;
use app\modules\slider\models\SlidePage;

class SliderItem extends \app\models\SliderItem {

    public $pages = [];

    public function behaviors() {
        return [
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'image' => [
                        'path' => '@webroot/image/slider',
                        'tempPath' => '@webroot/image/slider',
                        'url' => '/image/slider/'
                    ],
                ]
            ],
        ];
    }

    public function rules() {

        $rules = parent::rules();
        $rules[] = ['pages', 'safe'];

        return $rules;
    }

    public function afterSave($insert, $changedAttributes) {

        if ($this->pages) {
            SlidePage::deleteAll(['slide_id' => $this->id]);

            foreach ($this->pages as $item):

                $model = new SlidePage;
                $model->slide_id = $this->id;
                $model->page_id = $item;
                $model->save();

            endforeach;
        } else {
            SlidePage::deleteAll(['slide_id' => $this->id]);
        }




        return parent::afterSave($insert, $changedAttributes);
    }

    public function afterFind() {

        $model = SlidePage::findAll(['slide_id' => $this->id]);

        foreach ($model as $item)
            $this->pages[] = $item->page_id;

        return parent::afterFind();
    }

    public function getSlidePage() {
        return $this->hasOne(SlidePage::className(), ['slide_id' => 'id']);
    }

}
