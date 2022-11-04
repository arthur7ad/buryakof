<?php

use yii\helpers\Html;
use yii\widgets\ListView;


$this->registerJsFile('@web/js/dReadmore.js', ['depends' => ['app\assets\AppAsset']]);
$this->registerJsFile('@web/js/dreadmore_init.js', ['depends' => ['app\assets\AppAsset']]);
?>


<div class="reviews-index row">
    <div class="col-xs-12">
<?php
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
        'class' => 'review-wrapper',
    ],
    'layout' => "{items}\n{pager}\n",
    'itemView' => '_review_item',
    'itemOptions' => [
        'tag' => 'div',
        'class' => 'review-item col-xs-12 col-sm-4',
    ],
]);
?>

    </div>
</div>