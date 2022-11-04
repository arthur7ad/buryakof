<?php

namespace app\modules\slider;

use yii\web\AssetBundle;

class ModuleAssets extends AssetBundle {

    public $publishOptions = [
        'forceCopy' => YII_DEBUG //DEV
    ];
    public $sourcePath = '@app/modules/slider/assets';
    public $css = [
        'css/slider.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
