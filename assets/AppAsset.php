<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $publishOptions = [
        'forceCopy' => YII_DEBUG //DEV
    ];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'fonts/Montserrat/font.css',
        'fonts/ProximaNova/stylesheet.css',
//        'css/magnific-popup.css',
       // 'css/site.css',
//        'css/slick.css',
//        'css/slick-theme.css',
        'css/jBox/jBox.css',
        'css/jBox/jBox.Notice.css',
        'css/fa/css/all.css',
//        'css/pgwslider.min.css',
    ];
    public $jsOptions = [
    'async' => 'async',
    'defer'=>true
];
    public $js = [
//        'js/jquery.magnific-popup.min.js',
//        'js/slick.min.js',
        'js/owl.carousel.min.js',
//        '//use.fontawesome.com/2feef9962c.js',
        'css/jBox/jBox.min.js',
        'css/jBox/jBox.Notice.min.js',
        'js/bootstrap-hover-dropdown.min.js',
        'js/common.js',
        'js/form/order.js',
        'js/colorbox.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
