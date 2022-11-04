<?php

namespace app\modules\feedback;

use yii\web\AssetBundle;

class Assets extends AssetBundle {

    public $publishOptions = [
        'forceCopy' => YII_DEBUG //DEV
    ];
    public $sourcePath = '@app/modules/feedback/assets';
    public $css = [
        'css/feedback.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
