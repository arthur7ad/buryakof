<?php

use yii\bootstrap\Html;
?>


<div class="item-wrap" 
     data-target= "#order-modal" 
     data-toggle = "modal"
     data-title = "Заказ грузчиков <?= $model->name ?>"
     onClick = "ym(53972095, 'reachGoal', 'gruzchiki')"
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

            <?=
            Html::button('ЗАКАЗАТЬ', [
//                'data-target' => '#order-modal',
//                'data-toggle' => 'modal',
                'data-title' => 'Заказ грузчиков ' . $model->name,
                'class' => 'btn btn-yellow center-block shadow',
                'onClick' => "ym(53972095,'reachGoal','gruzchiki')"
            ])
            ?>

        </div>
    </div>
</div>