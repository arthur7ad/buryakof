<?php

namespace app\modules\autopark\models;

use Yii;
use vova07\fileapi\behaviors\UploadBehavior;

class Autopark extends \app\models\Autopark {

    const TYPE = [
        'Не указан',
        'Газель',
        'Фура',
        'Рефрижираторы',
    ];

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

}
