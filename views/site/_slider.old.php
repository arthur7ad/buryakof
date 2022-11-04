<?php

use yii\helpers\Html;
use kv4nt\owlcarousel\OwlCarouselWidget;
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
        'autoplayTimeout' => 6000,
        'items' => 1,
        'loop' => true,
        'dots' => false,
        'nav' => false,
    ]
]);
?>
<?php foreach (glob(Yii::getAlias('@app') . '/web/image/slider/' . "*.{jpg,png,gif}", GLOB_BRACE) as $k => $item): ?>
    <div class="item-class">
        <div class="content-wrap">
            <div class="container">
                <p class="h2">Выгодные цены на домашние, <?= $k ?></p>
                <p class="comment">квартирные переезды по России<?= $k ?></p>
                <?=
                Html::a(Html::img('/image/btn.png', ['class' => 'partner']), '#', [
                    'data-toggle' => "modal",
                    'data-target' => "#order-modal",
                ])
                ?>
            </div>
        </div>
        <img class="" src="<?= '/image/slider/' . basename($item) ?>" data-srcset="" data-sizes="" alt="slider_img">
    </div>
<?php endforeach; ?>


<?php OwlCarouselWidget::end(); ?>

<?= app\modules\forms\widgets\Order::widget(); ?>
