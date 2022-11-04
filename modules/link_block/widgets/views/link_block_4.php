<?php

use yii\bootstrap\Html;
?>

<div class="link-block slide">
    <div class="container">
        <div class="h2 header-line"><?= $model->title ?></div>

        <div class="row">

            <?php foreach ($model->linkBlockItems as $item): ?>

                <div class="col-xs-6 col-sm-3 item-wrap" data-target="#order-modal" data-toggle="modal" data-title="<?= $item->name ?>" onclick="ym(53972095, 'reachGoal', 'pereezdy')">
                    <div class="item">
                        <div class="image" style="background: url('<?= $item->image ?>') 
                             center center no-repeat" >
                        </div>
                        <div class='text'><?= $item->name ?></div>
                    </div>
                </div>

            <?php endforeach;
            ?>
        </div>
    </div>
</div>