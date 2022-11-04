<?php

use yii\helpers\Html;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="image" style="background: url('<?= $model->getImg() ?>') center center no-repeat;background-size: 100% !important;min-height:200px;" onclick="$.colorbox({href:'<?= $model->getImg() ?>',maxWidth:'100%',maxHeight:'100%'});"></div>

    </div>
    <?php if($model->name) { ?>
    <div class="panel-body">
        <div class="name-wrap">
            <strong><?= $model->name ?></strong>
        </div>
    </div>
    <?php } ?>


</div>
