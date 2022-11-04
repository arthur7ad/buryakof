<?php

use yii\helpers\Html;
use kv4nt\owlcarousel\OwlCarouselWidget;
?>
<div class="slider">
    <div class="slider-wrap">

        <?php
        OwlCarouselWidget::begin([
            'container' => 'div',
            'containerOptions' => [
                'id' => 'main-slider',
                'class' => 'lazy slider owl-theme'
            ],
            'pluginOptions' => [
                'autoplay' => true,
                'autoplayTimeout' => 6000,
                'items' => 1,
                'loop' => true,
                'dots' => false,
                'nav' => false,
            ]
        ]);
        ?>

        <div class="item-class">
            <div class="content-wrap">
                <div class="container">
                    <p class="h2"> <?= $model->slideTitle ?></p>
                    <p class="comment"><?= $model->slideDescription ?></p>
                    <?=
                    Html::a($model->slideBtnText ? $model->slideBtnText : 'Заказать', '#', [
                        'class' => "slider-btn",
                        'data-toggle' => "modal",
                        'data-target' => "#order-modal",
                        'data-type' => $model->slideTitle,
                        'onClick' => '$("#order-form #order-type").val($(this).attr("data-type"))',
                    ])
                    ?>
                </div>
            </div>
            <img class="" src="<?= '/image/slide/' . $model->slideImage ?>" data-srcset="" data-sizes="" alt="slider_img">
        </div>


        <?php OwlCarouselWidget::end(); ?>

        <?= app\modules\forms\widgets\Order::widget(); ?>

    </div>
</div>