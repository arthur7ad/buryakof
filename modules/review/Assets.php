<?php

namespace app\modules\review;

use yii\web\AssetBundle;

class Assets extends AssetBundle {

    public $publishOptions = [
        'forceCopy' => YII_DEBUG //DEV
    ];
    public $sourcePath = '@app/modules/review/assets';
    public $css = [
        'css/reviews.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
