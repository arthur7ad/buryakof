<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;

//$this->registerJsFile('@web/js/forms.js', ['depends' => ['app\assets\AppAsset']]);
?>

<?php
Modal::begin([
    'id' => 'calcorder-form-modal',
    'header' => '<p class="h4 text-center">Не удалось автоматически просчитать маршрут</p>'
    . '<p class="h3 text-center">Вы можете оставить ваши контактные данные, чтобы наши менеджеры рассчитали стоимость и связались с вами.</p>',
//    'toggleButton' => [
//        'label' => Html::img('/image/ico/phone.png').' Заказать звонок', 'class' => 'btn-link call-back-btn'
//    ],
]);
?>

<?php
$form = ActiveForm::begin([
            'id' => 'calcorder-form',
            'action' => '/forms/default/calc-form',
            'enableAjaxValidation' => true,
        ]);
?>

<?= $form->field($model, 'from')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'to')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'params')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'name')->textInput() ?>
<?=
$form->field($model, 'phone')->widget(MaskedInput::className(), [
    'mask' => '+7 (999) 999-9999',
    'options' => ['placeholder' => 'Телефон', 'class' => 'form-control'],
])
?>
<br/>
<p class="text-muted">
    Нажимая на кнопку отправить вы соглашаетесь с <a href="/o-kompanii/dokumenty/politika-obrabotki-personal-nyh-dannyh"> политикой</a> по обработке персональных данных
</p>
<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>

<?php
ActiveForm::end();

Modal::end();
?>



