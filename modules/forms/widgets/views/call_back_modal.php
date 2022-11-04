<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;

$this->registerJsFile('@web/js/form/callback.js', ['depends' => ['app\assets\AppAsset']]);

//$this->registerJsFile('@web/js/forms.js', ['depends' => ['app\assets\AppAsset']]);
?>

<?php
Modal::begin([
    'id' => 'callback-form-modal',
    'header' => '<p class="h2 text-center">Заказать звонок</p>',
//    'toggleButton' => [
//        'label' => Html::img('/image/ico/phone.png').' Заказать звонок', 'class' => 'btn-link call-back-btn'
//    ],
]);
?>

<?php
$form = ActiveForm::begin([
            'id' => 'callback-form',
//            'action' => '/forms/default/call-back-v',
//            'validationUrl' => '/forms/default/order-v',
//            'enableAjaxValidation' => true,
        ]);
?>

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
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-yellow shadow', 'onClick' => "ym(53972095,'reachGoal','zakaz_zvonka')"]) ?>
</div>

<?php
ActiveForm::end();

Modal::end();
?>



