<?php

use yii\helpers\Html;
?>

<div class="have-question">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8">

                <p class="title">Если остались вопросы</p>
                <p class="descr">позвоните нам прямо сейчас и узнайте <br/>
                    все интересующие все вопросы </p>
                <p class="phone"><?= Yii::$app->info::get('headTelephone') ?></p>

            </div>
            <div class="col-xs-12 col-md-4">
                <?=
                Html::button('Заказать звонок', [
                    'class' => 'btn btn-primary',
                    'data-toggle' => "modal",
                    'data-target' => "#callback-form-modal",
                ])
                ?>
            </div>
        </div>
    </div>
</div>