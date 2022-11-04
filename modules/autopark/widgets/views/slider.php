
<?php

use yii\bootstrap\Html;
use evgeniyrru\yii2slick\Slick;
use yii\web\JsExpression;

$js = <<< JS
$('#park-slider').on('init', function(event, slick, currentSlide){
        console.log('init');
 var
    cur = $(slick.\$slides[slick.currentSlide]),
    next = cur.next(),
    prev = cur.prev();
  prev.addClass('slick-sprev');
  next.addClass('slick-snext');
  cur.removeClass('slick-snext').removeClass('slick-sprev');
  slick.\$prev = prev;
  slick.\$next = next;
});
$('#park-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        
          console.log("beforeChange");
  var
    cur = $(slick.\$slides[nextSlide]);
  console.log(slick.\$prev, slick.\$next);
  slick.\$prev.removeClass("slick-sprev");
  slick.\$next.removeClass("slick-snext");
  next = cur.next(),
    prev = cur.prev();
  prev.prev();
  prev.next();
  prev.addClass("slick-sprev");
  next.addClass("slick-snext");
  slick.\$prev = prev;
  slick.\$next = next;
  cur.removeClass("slick-next").removeClass("slick-sprev");

});
JS;

$this->registerJs($js);

$items = [];

foreach ($model as $item):

    $items[] = $this->render('_slider_item', ['model' => $item]);

endforeach;
?>

<?=

Slick::widget([
// HTML tag for container. Div is default.
    'itemContainer' => 'div',
    // HTML attributes for widget container
    'containerOptions' => ['class' => '', 'id' => 'park-slider'],
    // Position for inclusion js-code
// see more here: http://www.yiiframework.com/doc-2.0/yii-web-view.html#registerJs()-detail
//    'jsPosition' => yii\web\View::POS_READY,
    // Items for carousel. Empty array not allowed, exception will be throw, if empty 
    'items' => $items,
    // HTML attribute for every carousel item
    'itemOptions' => ['class' => 'cat-image'],
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
        'slidesPerRow' => 1,
        'slidesToShow' => 1,
        'slidesToScroll' => 1,
        'centerPadding' => '0',
        'swipe' => true,
        // note, that for params passing function you should use JsExpression object
// but pay atention, In slick 1.4, callback methods have been deprecated and replaced with events.
        'onInit' => new JsExpression('function() {console.log("The cat has shown")}'),
    ],
]);
?>


