<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Карта сайта';
?>

<h1><?= $this->title ?></h1>

<ul>
    <?php foreach ($result as $k => $item): ?>

        <li><?= Html::a($item, $k) ?></li>

    <?php endforeach;
    ?>

</ul>