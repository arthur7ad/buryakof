<?php

use yii\bootstrap\Html;
use evgeniyrru\yii2slick\Slick;

$items = [];

if($model) {
    foreach ($model as $item)
        $items[] = $this->render('_slider_item', ['model' => $item]);
    ?>


    <?=

    Slick::widget([
// HTML tag for container. Div is default.
        'itemContainer' => 'div',
        // HTML attributes for widget container
        'containerOptions' => ['class' => '', 'id' => 'cases-slider'],
        // Position for inclusion js-code
// see more here: http://www.yiiframework.com/doc-2.0/yii-web-view.html#registerJs()-detail
//    'jsPosition' => yii\web\View::POS_READY,
        // Items for carousel. Empty array not allowed, exception will be throw, if empty
        'items' => $items,
        // HTML attribute for every carousel item
        'itemOptions' => ['class' => 'portfolio-image'],
        // settings for js plugin
// @see http://kenwheeler.github.io/slick/#settings
        'clientOptions' => [
            'speed' => 1000,
            'arrows' => true,
            'dots' => false,
            'focusOnSelect' => true,
            'prevArrow' => Html::img('/image/ico/arr-left.png', ['class' => 'arr-left']),
            'nextArrow' => Html::img('/image/ico/arr-right.png', ['class' => 'arr-right']),
            'infinite' => true,
            'centerMode' => true,
            'slidesToShow' => 3,
            'slidesToScroll' => count($model),
            'centerPadding' => '0',
            'swipe' => true,
            'responsive' => [
                ['breakpoint' => 1024,
                    'settings' => [
                        'slidesToShow' => 3,
                    ]
                ],
                ['breakpoint' => 640,
                    'settings' => [
                        'slidesToShow' => 2,
                    ]
                ],
            ],
            // note, that for params passing function you should use JsExpression object
// but pay atention, In slick 1.4, callback methods have been deprecated and replaced with events.
//        'onInit' => new JsExpression('function() {console.log("The cat has shown")}'),
        ],
    ]);
}
?>

<style>
    @media (max-width:600px) {
        #cases-slider .slick-arrow {
            height:20px;
            top:40%;
        }
        #cases-slider .item-wrap .item .image {
            background-size: 100% 80% !important;
        }
    }
    .slick-slider .slick-track, .slick-slider .slick-list {

    }
</style>
