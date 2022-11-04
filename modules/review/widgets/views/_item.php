<?php

use yii\helpers\Html;
?>

<div class="review-wrap">
    <div class="review-item">
        <div class="name">
            <?= $model->name ?>
            <span class="date pull-right">
                <?= Yii::$app->formatter->asDate($model->date, 'short') ?>
            </span>
        </div>
        <div class="comment">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <?php
                    if ($model->avatar)
                        echo Html::img($model->ava, ['class' => 'img img-responsive', 'alt' => 'Аватар'])
                        ?>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <?= $model->content ?>
                    
                </div>

            </div>
        </div>
    </div>
</div>