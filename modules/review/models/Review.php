<?php

namespace app\modules\review\models;

use Yii;
use vova07\fileapi\behaviors\UploadBehavior;
//use DateTime;
//use DateTimeZone;

class Review extends \app\models\Review {

    const TYPE = [
        0 => 'Грузоперевозки',
    ];

    public function behaviors() {
        return [
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'image' => [
                        'path' => '@webroot/image/review',
                        'tempPath' => '@webroot/image/review',
                        'url' => '/image/review/'
                    ],
                    'avatar' => [
                        'path' => '@webroot/image/review',
                        'tempPath' => '@webroot/image/review',
                        'url' => '/image/review/'
                    ],
                ]
            ],
        ];
    }

    public function getImg() {

        return '/image/review/' . $this->image;
    }

    public function getAva() {

        return '/image/review/' . $this->avatar;
    }

//    public function beforeSave($insert) {
//
//        if ($this->isNewRecord && !$this->date) {
//            $date = new DateTime('now', new DateTimeZone('+0300'));
//            $this->date = $date->format('Y-m-d H:i:s');
//        }
//
//        return parent::beforeSave($insert);
//    }

}
