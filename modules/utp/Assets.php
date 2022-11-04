<?php

namespace app\modules\utp;

use yii\web\AssetBundle;

class Assets extends AssetBundle {

    public $publishOptions = [
        'forceCopy' => YII_DEBUG //DEV
    ];
    public $sourcePath = '@app/modules/utp/assets';
    public $css = [
        'css/utp.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
