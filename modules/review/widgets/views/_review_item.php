<?php

use yii\helpers\Html;
?>

<div class="panel panel-default">
    <div class="panel-heading">

        <div class="row">
            <div class="col-xs-12 name-wrap">
                <strong><?= $model->name ?></strong>
            </div>

        </div>

    </div>

        <?php if($model->image) { ?>
    <div class="panel-body image">
            <div class="image" onclick="$.colorbox({href:'<?= $model->getImg() ?>',maxWidth:'100%',maxHeight:'100%'});" style="height:180px;background: url('<?= $model->getImg() ?>') center center no-repeat;background-size: 100% !important;">
            </div>

        <?php }elseif($model->youtube) { ?>
        <div class="panel-body youtube">
            <div class="d-readmore-wrapp">
                <?php
                $embed = explode('=', $model->youtube);
                ?>
                <iframe width="100%" height="180px" src="https://www.youtube.com/embed/<?=$embed[1]?>" title="Видео Отзыв" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

        <?php }else{ ?>
            <div class="panel-body">
        <div class="d-readmore-wrapp">
            <div class="d-readmore">
                <?= $model->text ?>

            </div>

            <?php //strlen($model->content) ?>

            <?php if (strlen($model->text) > 500) : ?>
                <span class="d-readmore_btn"></span>
            <?php endif; ?>

        </div>
    <?php } ?>
    </div>
</div>
