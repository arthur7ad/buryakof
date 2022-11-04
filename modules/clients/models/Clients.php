<?php

namespace app\modules\clients\models;

use vova07\fileapi\behaviors\UploadBehavior;
use Yii;

class Clients extends \app\models\Clients {

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
