<?php

use yii\bootstrap\Html;
?>


<div class="item-wrap">
    <div class="item">
    <a>
        <?php if($model->image) {   ?>
        <div class="image" style="background: url('<?= $model->getImg() ?>') center center no-repeat;background-size: 100% !important;"onclick="$.colorbox({href:'<?= $model->getImg() ?>',maxWidth:'100%',maxHeight:'100%'});">
        </div>
        <?php }elseif($model->youtube){ ?>

            <?php
            $embed = explode('=', $model->youtube);
            ?>
            <iframe width="100%"  src="https://www.youtube.com/embed/<?=$embed[1]?>" title="Видео Отзыв" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <?php }else{ ?>
        <p class="text_feedback"><?= $model->text; ?></p>
        <?php } ?>
        <div class="title"><?= $model->name ?></div>
    </a>
    </div>
</div>