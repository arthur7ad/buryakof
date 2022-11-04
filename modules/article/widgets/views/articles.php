<?php

use yii\helpers\Html;
use yii\widgets\ListView;
?>


<div class="article-index">
    <?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'class' => 'article-wrapper wrap',
        ],
        'layout' => "{items}\n{pager}\n",
        'itemView' => '_article_item',
        'itemOptions' => [
            'tag' => 'div',
            'class' => 'article-item col-xs-12 col-sm-4',
        ],
    ]);
    ?>

</div>