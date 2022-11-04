<?php

namespace app\modules\feedback\models;

use vova07\fileapi\behaviors\UploadBehavior;
use Yii;

class FeedbackItem extends \app\models\FeedbackItem
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

}
