<?php

use yii\bootstrap\Tabs;
use yii\bootstrap\Html;
use evgeniyrru\yii2slick\Slick;

$items = [];
//Yii::error(\Yii::$app->request->url);

foreach ($mezh->tarifItems as $item)
    $items[1][] = $this->render('_pereezdi_item', ['model' => $item]);

foreach ($gorod->tarifItems as $item)
    $items[2][] = $this->render('_pereezdi_item', ['model' => $item]);
?>

<div id="pereezdi">

    <?php
    if (\Yii::$app->request->url == '/pereezdy/mezhdugorodnyj-pereezd')
        echo Tabs::widget([
            'items' => [
                [
                    'label' => $mezh->name,
                    'content' => '<div class="row">' . implode('', $items[1]) . '</div>',
                    'active' => true
                ],
                [
                    'label' => $gorod->name,
                    'content' => '<div class="row">' . implode('', $items[2]) . '</div>',
                ],
            ],
            'options' => ['id' => 'pereezdi-tab'],
        ]);
    else
        echo Tabs::widget([
            'items' => [
                [
                    'label' => $gorod->name,
                    'content' => '<div class="row">' . implode('', $items[2]) . '</div>',
                    'active' => true
                ],
                [
                    'label' => $mezh->name,
                    'content' => '<div class="row">' . implode('', $items[1]) . '</div>',
                ],
            ],
            'options' => ['id' => 'pereezdi-tab'],
        ]);
    ?>
</div>