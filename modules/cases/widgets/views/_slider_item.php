<?php

use yii\bootstrap\Html;
?>


<div class="item-wrap">
    <div class="item">
<a href="<?=$model->url->url?>">
        <div class="image" style="background: url('<?= $model->getImg() ?>') center center no-repeat;background-size: 70%;">

        </div>
        <div class="title"><?= $model->name ?></div>
</a>
    </div>
</div>