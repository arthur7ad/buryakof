<?php

namespace app\modules\cabinet;

use yii\web\AssetBundle;

class MainAsset extends AssetBundle {

    public $sourcePath = '@app/modules/cabinet/assets';
    public $css = [
        'css/main.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
