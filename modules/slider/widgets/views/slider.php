<?php

use app\models\SliderItemCity;
use yii\helpers\Html;
use kv4nt\owlcarousel\OwlCarouselWidget;

$js = <<< JS
    $('#main-slider .owl-dots').css('left', $('.container').offset().left);
JS;
?>


<?php
OwlCarouselWidget::begin([
    'container' => 'div',
    'containerOptions' => [
        'id' => 'main-slider',
        'class' => 'lazy slider owl-theme'
    ],
    'pluginOptions' => [
        'autoplay' => true,
        'autoplayTimeout' => 8000,
        'items' => 1,
        'loop' => true,
        'dots' => true,
        'nav' => false,
    ]
]);
?>

<?php foreach ($model as $k => $item): ?>

<?php
    $cityData = SliderItemCity::findOne([
        'is_enable' => 1,
        'slider_item_id' => $item->id,
        'city_id' => \Yii::$app->city->id
    ]);
    ?>

    <div class="item-class slide-<?= $item->id ?>" style="background: url(<?= '/image/slider/' . $item->image ?>) bottom center no-repeat">
        <div class="content-wrap">
            <div class="container">

                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-9 col-md-offset-3 col-lg-7 col-lg-offset-5">
                        <?php if($cityData) { ?>

                            <?php if ($cityData->top_title): ?>
                                <p class="top-title"><?= $cityData->top_title ?></p>
                            <?php endif; ?>
                            <p class="comment"><?= $cityData->description ?></p>
                            <p class="h2"><?= $cityData->title ?></p>
                            <?php }else{ ?>
                        <?php if ($item->top_title): ?>
                            <p class="top-title"><?= $item->top_title ?></p>
                        <?php endif; ?>
                        <p class="comment"><?= $item->description ?></p>
                        <p class="h2"><?= $item->title ?></p>
                        <?php } ?>
                        <?=
                        Html::a('Заказать', 'javascript:void(0);', [
                            'class' => "btn btn-yellow shadow",
                            'data-toggle' => "modal",
                            'data-target' => "#order-modal",
                            'data-title' => 'Заказ c слайда ' . $item->name,
                            'onClick'=> "ym(53972095,'reachGoal','slide')"
//                    'onClick' => '$("#order-form #order-type").val($(this).attr("data-type"))',
                        ])
                        ?>
                    </div>
                </div>


            </div>
        </div>
        <!--<img class="" src="<?= '/image/slider/' . $item->image ?>" data-srcset="" data-sizes="" alt="slider_img">-->
    </div>
<?php endforeach; ?>

<?php OwlCarouselWidget::end(); ?>



<?php
$this->registerJs($js, $position = yii\web\View::POS_READY, $key = null);
?>