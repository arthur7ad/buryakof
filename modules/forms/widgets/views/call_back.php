<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;


?>

<?php
$form = ActiveForm::begin([
            'id' => 'callback-form-full',
//    'enableClientValidation' => false,
//            'action' => '/forms/default/call-back-v',
//            'validationUrl' => '/forms/default/order-v',
//            'enableAjaxValidation' => true,
        ]);
?>
<div class="call-back-wrap">
    <div class="row">
        <div class="col-xs-12 col-sm-8">

            <p class="h2">Закажите обратный звонок </p>
            <p class="comment">и мы свяжемся с Вами в ближайшее время!</p>

            <?=
            $form->field($model, 'name')->textInput([
                'placeholder' => 'Ваше имя'
            ])->label(false)
            ?>
            <?=
            $form->field($model, 'phone')->widget(MaskedInput::className(), [
                'mask' => 'Ваш телефон',
                'options' => ['placeholder' => 'Телефон', 'class' => 'form-control'],
            ])->label(false)
            ?>
            <p class="text-muted">
                Нажимая на кнопку «Заказать звонок» вы соглашаетесь с <a href="/o-kompanii/dokumenty/politika-obrabotki-personal-nyh-dannyh"> политикой</a> по обработке персональных данных
            </p>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="form-group">
                <?= Html::submitButton('Заказать звонок', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>



