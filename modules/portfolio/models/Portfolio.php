<?php

namespace app\modules\portfolio\models;

use Yii;
use vova07\fileapi\behaviors\UploadBehavior;

/**
 * This is the model class for table "portfolio".
 *
 * @property int $id
 * @property string $name Название
 * @property string $date Дата
 * @property string $anons Анонс
 * @property string $image Изображение
 */
class Portfolio extends \app\models\Portfolio {

    public function behaviors() {
        return [
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'image' => [
                        'path' => '@webroot/image/portfolio',
                        'tempPath' => '@webroot/image/portfolio',
                        'url' => '/image/portfolio/'
                    ],
                ]
            ],
        ];
    }

    public function getImg() {

        return '/image/portfolio/' . $this->image;
    }

}
