<?php

use kv4nt\owlcarousel\OwlCarouselWidget;
?>


<?php
OwlCarouselWidget::begin([
    'container' => 'div',
    'containerOptions' => [
        'id' => 'partners',
        'class' => 'lazy slider owl-theme'
    ],
    'pluginOptions' => [
        'autoplay' => false,
        'autoplayTimeout' => 6000,
        'items' => 3,
        'loop' => true,
        'dots' => true,
        'nav' => false,
        'responsive' => [
            0 => [
                'items' => 1,
            ],
            768 => [
                'items' => 3,
            ],
            1180 => [
                'items' => 4,
            ],
        ]
    ]
]);
?>
<?php foreach (glob(Yii::getAlias('@app') . '/public_html/image/partners/' . "*.{jpg,png,gif}", GLOB_BRACE) as $item): ?>
    <div class="item-class">
        <img class="" src="<?= '/image/partners/' . basename($item) ?>" data-srcset="" data-sizes="" alt="slider_img">
    </div>
<?php endforeach; ?>


<?php OwlCarouselWidget::end(); ?>
