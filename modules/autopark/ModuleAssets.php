<?php

namespace app\modules\autopark;

use yii\web\AssetBundle;

class ModuleAssets extends AssetBundle {

    public $publishOptions = [
        'forceCopy' => YII_DEBUG //DEV
    ];
    public $sourcePath = '@app/modules/autopark/assets';
    public $css = [
        'css/autopark.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
