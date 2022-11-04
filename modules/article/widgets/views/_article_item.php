<?php

use yii\helpers\Html;
?>

<div class="panel panel-default">
    <div class="panel-heading">

        <div class="name-wrap">
            <strong><?= $model->header ?></strong>
        </div>
        <div class="date-wrap">
            <span class="date">
                <?= Yii::$app->formatter->asDate($model->created_at, 'short') ?>
            </span>
        </div>


    </div>
    <div class="panel-body">
        <?= $model->anons ?>
        <br/>
        <br/>
        <?= Html::a('Подробнее', $model->url->url) ?>
    </div>


</div>
