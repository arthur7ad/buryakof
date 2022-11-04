<?php

namespace app\modules\galery\models;

use vova07\fileapi\behaviors\UploadBehavior;
use Yii;

class GaleryItem extends \app\models\GaleryItem
{
    public function behaviors()
    {
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

    public function getImg()
    {
        return '/image/upload/' . $this->image;
    }
}
