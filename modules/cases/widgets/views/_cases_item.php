<?php

use yii\helpers\Html;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="image" style="background: url('<?= $model->getImg() ?>') center center no-repeat;background-size: 100%;min-height:200px;"></div>

    </div>
    <div class="panel-body" style="height:90px">
        <div class="name-wrap">
            <strong><?= $model->name ?></strong>
        </div>
        <?= Html::a('Подробнее', $model->url->url) ?>
    </div>


</div>
