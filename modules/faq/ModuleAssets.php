<?php

namespace app\modules\faq;

use yii\web\AssetBundle;

class MainAsset extends AssetBundle {

    public $sourcePath = '@app/modules/faq/assets';
    public $css = [
        'css/faq.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
