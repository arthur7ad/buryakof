<?php

use yii\bootstrap\Html;
?>

<div class="link-block slide">
    <div class="container">
        <div class="h2 header-line"><?= $model->title ?></div>

        <div class="row">

            <?php foreach ($model->linkBlockItems as $item): ?>

                <div class="col-xs-6 col-sm-4 col-md-2 item-wrap">
                    <div class="item">
                        <a href='<?= $item->url->url == Yii::$app->request->url ? 'javascript:void(0)' : $item->url->url ?>'> 
                            <div class="image" style="background: url('<?= $item->image ?>') 
                                 center center no-repeat" >
                            </div>
                            <div class='text'><?= $item->name ?></div>
                        </a>
                    </div>
                </div>

            <?php endforeach;
            ?>
        </div>
    </div>
</div>