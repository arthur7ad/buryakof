<?php

use yii\helpers\Html;
?>

<div class="calc-min">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-5">
                <?= \app\modules\calc\widgets\CalcLocal::widget(); ?>
            </div>
            <div class="col-xs-12 col-md-offset-1  col-md-6 left hidden-xs hidden-sm">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <p class="title">Газель Next удлиненная</p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <?= Html::img('/image/car/gazel_next-dl.png', ['class' => 'img img-responsive', 'alt' => 'Газель Next удлиненная']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <p class="title">Газель</p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <?= Html::img('/image/car/gazel_next.png', ['class' => 'img img-responsive', 'alt' => 'Газель']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <p class="title">Газон Некст</p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <?= Html::img('/image/car/gazon_next.png', ['class' => 'img img-responsive', 'alt' => 'Газон Некст']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <p class="title">Авто (Ман,Мерседес)</p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <?= Html::img('/image/car/avto.png', ['class' => 'img img-responsive', 'alt' => 'Авто (Ман,Мерседес)']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>