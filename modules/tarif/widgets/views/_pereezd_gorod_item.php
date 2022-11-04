<?php

use yii\bootstrap\Html;
?>


<div class="item-wrap col-xs-12 col-sm-6 col-md-4 <?= ($k == 3) ? 'col-md-offset-2' : '' ?>" 
     data-target= "#order-modal" 
     data-toggle = "modal"
     data-title = "Заказ переезда <?= $model->name ?>"
     onClick = "ym(53972095, 'reachGoal', 'pereezdy')"
     >
    <div class="item panel panel-default">

        <div class="panel-heading">


            <?php if ($model->is_akcia): ?>
                <div class="akcia">
                    Акция
                </div>
            <?php endif; ?>

            <div class="title <?= $model->is_akcia ? 'akcia-title' : '' ?>"><?= $model->name ?></div>
            <div class="price"><?= $model->price ?></div>


        </div>
        <div class="panel-body">


            <div class="text1"><?= $model->text1 ?></div>
            <div class="text2"><?= $model->text2 ?></div>


        </div>
        <div class="panel-footer">

            <?php Html::img($model->img, ['class' => 'img img-responsive']) ?>

            <?=
            Html::button('ЗАКАЗАТЬ', [
//                'data-target' => '#order-modal',
//                'data-toggle' => 'modal',
//                'data-title' => 'Заказ переезда ' . $model->name,
                'class' => 'btn btn-yellow center-block shadow',
//                'onClick' => "ym(53972095,'reachGoal','pereezdy')"
            ])
            ?>

        </div>
    </div>
</div>