<?php

use yii\bootstrap\Html;
?>


<div class="item-wrap"
     data-target= "#order-modal" 
     data-toggle = "modal"
     data-title = "Заказ такелаж <?= $model->name ?>"
     onClick = "ym(53972095, 'reachGoal', 'vyvoz_musora')"
     >
    <div class="item panel panel-default">

        <div class="panel-heading">

            <div class="title"><?= $model->name ?></div>
            <div class="price"><?= $model->price ?></div>


        </div>
        <div class="panel-body">


            <div class="text1"><?= $model->text1 ?></div>
            <div class="text2"><?= $model->text2 ?></div>


        </div>
        <div class="panel-footer">

            <?php // ($model->img) ? Html::img($model->img, ['class' => 'img img-responsive']) : '' ?>

            <?=
            Html::button('ЗАКАЗАТЬ', [
//                'data-target' => '#order-modal',
//                'data-toggle' => 'modal',
//                'data-title' => 'Заказ такелаж ' . $model->name,
                'class' => 'btn btn-yellow center-block shadow',
//                'onClick' => "ym(53972095,'reachGoal','takelazh')"
            ])
            ?>

        </div>
    </div>
</div>