<?php

use yii\bootstrap\Html;
?>


<div class="item-wrap">
    <div class="item">

        <div class="title"><?= $model->name ?></div>

        <p><?= $model->description ?></p>


        <?=
        Html::button('Заказать', [
            'data-target' => '#order-modal',
            'data-toggle' => 'modal',
            'data-title' => 'Заказ УТП ' . $model->name,
            'class' => 'btn btn-yellow center-block shadow',
            'onClick' => "ym(53972095,'reachGoal','utp')"
        ])
        ?>

    </div>
</div>