<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use evgeniyrru\yii2slick\Slick;

$this->registerJsFile('@web/js/dReadmore.js', ['depends' => ['app\assets\AppAsset']]);
$this->registerJsFile('@web/js/dreadmore_init.js', ['depends' => ['app\assets\AppAsset']]);

$items = [];

foreach ($model as $item):

    $items[] = $this->render('_review_item', ['model' => $item]);

endforeach;
?>

<?=

Slick::widget([
// HTML tag for container. Div is default.
    'itemContainer' => 'div',
    // HTML attributes for widget container
    'containerOptions' => ['class' => '', 'id' => 'review-slider'],
    // Position for inclusion js-code
// see more here: http://www.yiiframework.com/doc-2.0/yii-web-view.html#registerJs()-detail
//    'jsPosition' => yii\web\View::POS_READY,
    // Items for carousel. Empty array not allowed, exception will be throw, if empty 
    'items' => $items,
    // HTML attribute for every carousel item
    'itemOptions' => ['class' => 'review-item'],
    // settings for js plugin
// @see http://kenwheeler.github.io/slick/#settings
    'clientOptions' => [
        'speed' => 1000,
        'arrows' => false,
        'dots' => true,
        'nextArrow' => Html::img('/image/ico/arr-right.png', ['class' => 'arr-right']),
        'slidesToShow' => 3,
        'slidesToScroll' => 3,
        'responsive' => [
            ['breakpoint' => 1024,
                'settings' => [
                    'slidesToShow' => 2,
                    'slidesToScroll' => 2,
                ]
            ],
            ['breakpoint' => 640,
                'settings' => [
                    'slidesToShow' => 1,
                    'slidesToScroll' => 1,
                ]
            ],
        ]
    // note, that for params passing function you should use JsExpression object
// but pay atention, In slick 1.4, callback methods have been deprecated and replaced with events.
//        'onInit' => new JsExpression('function() {console.log("The cat has shown")}'),
    ],
]);
?>