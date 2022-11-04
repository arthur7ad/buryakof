<?php

namespace app\modules\city;

use yii\web\AssetBundle;

class Assets extends AssetBundle {

    public $publishOptions = [
        'forceCopy' => YII_DEBUG //DEV
    ];
    public $sourcePath = '@app/modules/city/assets';
    public $css = [
        'css/map.css',
        'css/city.css',
    ];
    public $js = [
//        'https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=274d298c-e0cd-4b6e-9bb1-10695c80c8df',
//        'js/city.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
