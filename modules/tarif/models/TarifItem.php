<?php

namespace app\modules\tarif\models;

use Yii;
use vova07\fileapi\behaviors\UploadBehavior;

class TarifItem extends \app\models\TarifItem {

    public function behaviors() {
        return [
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'image' => [
                        'path' => '@webroot/image/tarif',
                        'tempPath' => '@webroot/image/tarif',
                        'url' => '/image/tarif/'
                    ],
                ]
            ],
        ];
    }

    public function getImg() {
        return '/image/tarif/' . $this->image;
    }

}
