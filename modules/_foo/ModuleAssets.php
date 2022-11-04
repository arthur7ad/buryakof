<?php

namespace app\modules\_foo;

use yii\web\AssetBundle;

class MainAsset extends AssetBundle {

    public $publishOptions = [
        'forceCopy' => YII_DEBUG //DEV
    ];
    public $sourcePath = '@app/modules/_foo/assets';
    public $css = [
        'css/main.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
