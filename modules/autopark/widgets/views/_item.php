<?php

use yii\helpers\Html;
?>


<div class="col-xs-12 col-sm-6 col-md-4 item-wrap">

    <div class="item">

        <div class="top">
            <div class="title"><?= $model->name ?></div>

            <div class="image-wrap" style="background: url('<?= $model->Img ?>') center center no-repeat"></div>

            <p><?= $model->for ?></p>
        </div>

        <div class="bottom">

            <div class="wrap">
                <div class="row-wrap">

                    <div class="col-title">Объём:</div>
                    <div class="col-wide">&nbsp;</div>
                    <div class="col"><?= $model->volume ?> м<sup>3</sup></div>

                </div>
                <div class="row-wrap">

                    <div class="col-title">Грузоподъёмность:</div>
                    <div class="col-wide">&nbsp;</div>
                    <div class="col"><?= $model->carrying ?> т</div>

                </div>
                <div class="row-wrap">

                    <div class="col-title">Стоимость:</div>
                    <div class="col-wide">&nbsp;</div>
                    <div class="col"><?= $model->price_tarif1 ?> руб в час</div>

                </div>
            </div>

            <?=
            Html::button('Заказать машину', [
                'data-target' => '#order-modal',
                'data-toggle' => 'modal',
                'data-title' => 'Заказ машины ' . $model->name,
                'class' => 'btn btn-yellow center-block shadow',
                'onClick' => "ym(53972095,'reachGoal','avtopark')",
            ])
            ?>

        </div>


    </div>

</div>
