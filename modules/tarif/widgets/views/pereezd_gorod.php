<?php

use yii\bootstrap\Tabs;
use yii\bootstrap\Html;
use evgeniyrru\yii2slick\Slick;
?>

<div id="pereezdi">

    <?php
    foreach ($gorod->tarifItems as $k => $item)
        echo $this->render('_pereezd_gorod_item', [
            'model' => $item,
            'k' => $k,
            ]);
    ?>

</div>