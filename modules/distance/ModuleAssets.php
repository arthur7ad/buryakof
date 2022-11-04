<?php

namespace app\modules\distance;

use yii\web\AssetBundle;

class MainAsset extends AssetBundle {

    public $sourcePath = '@app/modules/distance/assets';
    public $css = [
        'css/main.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
