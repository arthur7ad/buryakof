<?php

use yii\bootstrap\Html;
?>


<div class="item-wrap">
    <div class="top">

        <p class="title"><?= $model->name ?></p>

        <div class="image-wrap slide-<?= $model->id ?>" style="background: url('<?= $model->Img ?>') bottom center no-repeat">
        </div>

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
                <div class="col"><?= $model->price ?> руб в час</div>

            </div>
        </div>

        <?=
        Html::button('Заказать машину', [
            'data-target' => '#order-modal',
            'data-toggle' => 'modal',
            'data-title' => 'Заказ машины ' . $model->name,
            'class' => 'btn btn-yellow center-block shadow',
        ])
        ?>

    </div>
</div>