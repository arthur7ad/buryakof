<?php

namespace app\modules\portfolio;

use yii\web\AssetBundle;

class Assets extends AssetBundle {

    public $publishOptions = [
        'forceCopy' => YII_DEBUG //DEV
    ];
    public $sourcePath = '@app/modules/portfolio/assets';
    public $css = [
        'css/portfolio.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
