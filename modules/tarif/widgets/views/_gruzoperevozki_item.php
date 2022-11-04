<?php

use yii\bootstrap\Html;
?>


<div class="item-wrap"
     data-target= "#order-modal" 
     data-toggle = "modal"
     data-title = "Заказ грузоперевозок <?= $model->name ?>"
     onClick = "ym(53972095, 'reachGoal', 'gruzoperevozki')"
     >


    <div class="item panel panel-default">

        <div class="panel-heading">

            <div class="title"><?= $model->name ?></div>
            <div class="price"><?= $model->price ?></div>
            <div class="text1"><pre><?= $model->text1 ?></pre></div>
            <div class="text2"><?= $model->text2 ?></div>

        </div>
        <div class="panel-body">

            <?= Html::img($model->img, ['class' => 'img img-responsive', 'alt' => $model->alt]) ?>

            <?=
            Html::button('ЗАКАЗАТЬ', [
//                'data-target' => '#order-modal',
//                'data-toggle' => 'modal',
//                'data-title' => 'Заказ грузоперевозок ' . $model->name,
                'class' => 'btn btn-yellow center-block shadow',
//                'onClick' => "ym(53972095,'reachGoal','gruzoperevozki')"
            ])
            ?>

        </div>
    </div>
</div>