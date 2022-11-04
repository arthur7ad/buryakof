<?php

use yii\helpers\Html;
use kv4nt\owlcarousel\OwlCarouselWidget;
?>


<div class="reviews">
    <div class="container">
        <div class="h2">Отзывы наших клиентов</div>

        <?php
        OwlCarouselWidget::begin([
            'container' => 'div',
            'containerOptions' => [
                'id' => 'popular',
                'class' => 'lazy slider owl-theme'
            ],
            'pluginOptions' => [
                'autoplay' => false,
                'autoplayTimeout' => 6000,
                'loop' => true,
                'dots' => false,
                'nav' => true,
                'responsiveClass' => true,
                'navText' => [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                'responsive' => [
                    0 => [
                        'items' => 1,
                    ],
                    1024 => [
                        'items' => 2,
                    ],
                ]
            ]
        ]);
        ?>


        <?php
        foreach ($model as $item):

            echo $this->render('_item', ['model' => $item]);

        endforeach;
        ?>

        <?php OwlCarouselWidget::end(); ?>
    </div>
</div>