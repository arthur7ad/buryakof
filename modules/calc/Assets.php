<?php

namespace app\modules\calc;

use yii\web\AssetBundle;

class Assets extends AssetBundle {

    public $publishOptions = [
        'forceCopy' => YII_DEBUG //DEV
    ];
    public $sourcePath = '@app/modules/calc/assets';
    public $css = [
        'css/calc.css',
    ];
    public $js = [
//        'https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=274d298c-e0cd-4b6e-9bb1-10695c80c8df',
//        '//api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=478bdf92-6afb-49c9-8e25-55a1119b4239',
        'https://api-maps.yandex.ru/2.1/?apikey=a1255e8c-1cac-4d49-8db7-3648d0741538&lang=ru_RU',
        'js/Calc.js',
        'js/init.js',
        'js/common.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
