<?php

use yii\helpers\Html;
use yii\bootstrap\Collapse;

$this->registerCssFile('/css/faq.css');

$this->title = 'Часто задаваемые вопросы';
$this->params['breadcrumbs'][] = $this->title;

$items = [];

foreach ($reviews as $review):
    $items[] = [
        'label' => $review->question,
        'content' => $review->answer,
    ];
endforeach;
?>

<div class="faq-index">

    <h1><?= $this->title ?></h1>


    <?php
    echo Collapse::widget([
        'items' => $items,
    ]);
    ?>

</div>