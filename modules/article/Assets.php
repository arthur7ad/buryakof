<?php

namespace app\modules\article;

use yii\web\AssetBundle;

class Assets extends AssetBundle {

    public $publishOptions = [
        'forceCopy' => YII_DEBUG //DEV
    ];
    public $sourcePath = '@app/modules/article/assets';
    public $css = [
        'css/article.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
