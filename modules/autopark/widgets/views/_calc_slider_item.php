<?php

use yii\bootstrap\Html;
?>


<div class="item-wrap" 
     data-name="<?= $model->name ?>" 
     data-tarif1-price="<?= $model->price_tarif1 ?>" 
     data-tarif2-price="<?= $model->price_tarif2 ?>" 
     data-price-km_oblast="<?= $model->price_km_oblast ?>"
     data-price-km_country="<?= $model->price_km_country ?>">
    <div class="top">

        <p class="title"><?= $model->name ?></p>

        <div class="image-wrap" style="background: url('<?= $model->Img ?>') center center no-repeat">
        </div>

        <div class="descripton">


            <div class="wrap">
                <div class="row-wrap">

                    <div class="col-title">Объём:</div>
                    <div class="col-wide">&nbsp;</div>
                    <div class="col"><?= $model->volume ?> м<sup>3</sup></div>

                </div>
                <div class="row-wrap">

                    <div class="col-title">Грузоподъёмность:</div>
                    <div class="col-wide">&nbsp;</div>
                    <div class="col"><?= $model->carrying ?> т</div>

                </div>
                <div class="row-wrap">

                    <div class="col-title">Стоимость:</div>
                    <div class="col-wide">&nbsp;</div>
                    <div class="col"><?= $model->price_tarif1 ?> руб в час</div>

                </div>
            </div>


        </div>


    </div>
</div>