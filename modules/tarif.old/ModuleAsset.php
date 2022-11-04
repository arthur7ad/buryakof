<?php

namespace app\modules\tarif;

use yii\web\AssetBundle;

class ModuleAsset extends AssetBundle {

    public $publishOptions = [
        'forceCopy' => YII_DEBUG //DEV
    ];
    public $sourcePath = '@app/modules/tarif/assets';
    public $css = [
        'css/tarif.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
