<?php

use yii\bootstrap\Tabs;
use yii\bootstrap\Html;
use evgeniyrru\yii2slick\Slick;

$items = [];


foreach ($model->tarifItems as $item)
    $items[] = $this->render('_gruzchiki_item', ['model' => $item]);
?>


<?php

echo Slick::widget([
// HTML tag for container. Div is default.
    'itemContainer' => 'div',
    // HTML attributes for widget container
    'containerOptions' => ['class' => '', 'id' => 'gruzchiki-slider'],
    // Position for inclusion js-code
// see more here: http://www.yiiframework.com/doc-2.0/yii-web-view.html#registerJs()-detail
//    'jsPosition' => yii\web\View::POS_READY,
    // Items for carousel. Empty array not allowed, exception will be throw, if empty 
    'items' => $items,
    // HTML attribute for every carousel item
    'itemOptions' => ['class' => 'gruzchiki-item'],
    // settings for js plugin
// @see http://kenwheeler.github.io/slick/#settings
    'clientOptions' => [
        'speed' => 1000,
        'arrows' => false,
        'autoplay' => true,
        'dots' => false,
        'focusOnSelect' => true,
        'prevArrow' => Html::img('/image/ico/arr-left.png', ['class' => 'arr-left']),
        'nextArrow' => Html::img('/image/ico/arr-right.png', ['class' => 'arr-right']),
        'infinite' => true,
        'centerMode' => true,
        'slidesToShow' => 4,
        'slidesToScroll' => count($items),
        'centerPadding' => '0',
        'swipe' => true,
        'responsive' => [
            ['breakpoint' => 1024,
                'settings' => [
                    'slidesToShow' => 2,
                ]
            ],
            ['breakpoint' => 640,
                'settings' => [
                    'slidesToShow' => 1,
                ]
            ],
        ],
    // note, that for params passing function you should use JsExpression object
// but pay atention, In slick 1.4, callback methods have been deprecated and replaced with events.
//        'onInit' => new JsExpression('function() {console.log("The cat has shown")}'),
    ],
]);
?>
