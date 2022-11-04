<?php

use yii\bootstrap\Html;
?>


<div class="item-wrap">
    <div class="item">

        <div class="image" style="background: url('<?= $model->img ?>') center center no-repeat">

        </div>

        <div class="row">
            <div class="col-xs-7 title">
                <?= $model->name ?>

            </div>
            <div class="col-xs-5 date text-right">
                <?= $model->date ?>
            </div>
        </div>

        <div class="text">
            <?= $model->anons ?>
        </div>
    </div>
</div>