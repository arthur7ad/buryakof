<?php

use yii\helpers\Html;
?>

<?php //if ($model->preemImage): ?>
<?php if (false): ?>

    <div class="preem">
        <div class="container">
            <p class="h2 text-center">Как мы работаем:</p>
            <?= Html::img('/image/preem/' . $model->preemImage, ['class' => 'img img-responsive', 'alt' => 'Преимущество']) ?>
        </div>
    </div>


<?php else: ?>
    <div class="how-we-work">
        <div class="container">

            <p class="h2 text-center">Как мы работаем:</p>

            <div class="row">
                <div class="hidden-xs col-sm-offset-3 col-sm-2 ">
                    <?= Html::img('/image/arr-1.png', ['class' => 'img img-responsive', 'alt' => 'Приём звонка']) ?>
                </div>
                <div class="hidden-xs col-sm-offset-2 col-sm-2 ">
                    <?= Html::img('/image/arr-1.png', ['class' => 'img img-responsive', 'alt' => 'Приём звонка']) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4 hww-wrap">
                    <?= Html::img('/image/hww-1.png', ['class' => 'img img-responsive center-block', 'alt' => 'Приём звонка']) ?>
                    <div class="text text-center">Приём звонка</div>
                </div>
                <div class="col-xs-12 col-sm-4 hww-wrap">
                    <?= Html::img('/image/hww-2.png', ['class' => 'img img-responsive center-block', 'alt' => 'Расчёт стоимости']) ?>
                    <div class="text text-center">Расчёт стоимости</div>
                </div>
                <div class="col-xs-12 col-sm-4 hww-wrap">
                    <?= Html::img('/image/hww-3.png', ['class' => 'img img-responsive center-block', 'alt' => 'Заключение договора']) ?>
                    <div class="text text-center">Заключение договора</div>
                </div>
                <div class="col-xs-12 col-sm-offset-2 col-sm-4 hww-wrap">
                    <?= Html::img('/image/hww-4.png', ['class' => 'img img-responsive center-block', 'alt' => 'Перевозка груза']) ?>
                    <div class="text text-center">Перевозка груза</div>
                </div>
                <div class="col-xs-12 col-sm-4 hww-wrap">
                    <?= Html::img('/image/hww-5.png', ['class' => 'img img-responsive center-block', 'alt' => 'Оплата за перевозку']) ?>
                    <div class="text text-center">Оплата за перевозку</div>
                </div>
            </div>

            <div class="row">
                <div class="hidden-xs col-sm-offset-5 col-sm-2 ">
                    <?= Html::img('/image/arr-2.png', ['class' => 'img img-responsive', 'alt' => 'Приём звонка']) ?>
                </div>
            </div>

        </div>
    </div>
<?php endif; ?>