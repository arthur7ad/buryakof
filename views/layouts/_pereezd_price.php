<?php

use yii\helpers\Html;

$this->registerCssFile('/css/pereezd-price.css');
?>



<div class="pereezd-price-title-wrap">
    <div class="container">
        <div class="h2 header-line">Бесплатная оценка переезда</div>
    </div>
</div>

<div class="pereezd-price">

    <div class="container">
        <div class="row">
            <div class="col-xs-3 col-sm-2">

                <?= Html::img('/image/calc.png', ['class' => 'img img-responsive', 'alt' => 'Calc']) ?>

            </div>
            <div class="col-xs-9 col-sm-10">

                <div class="text">
                    <?= Yii::$app->info->get('pereezd-price'); ?>
                </div>

                <?=
                Html::button('Заказать оценку', [
                    'data-target' => '#order-modal',
                    'data-toggle' => 'modal',
                    'data-title' => 'Заказ бесплатной оценки переезда',
                    'class' => 'btn btn-yellow shadow',
                    'onClick' => "ym(53972095,'reachGoal','ocenka');"
                ])
                ?>

            </div>
        </div>
    </div>
</div>