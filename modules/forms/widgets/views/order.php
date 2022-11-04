<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;

//$this->registerJsFile('@web/js/form/order.js', ['depends' => ['app\assets\AppAsset']]);
//$this->registerJsFile('@web/js/form/order.js', ['position' => \yii\web\View::POS_END]);
?>

<?php
Modal::begin([
    'id' => 'order-modal',
    'header' => '<p class="h2 text-center">Оставьте ваши контактные данные. Наш менеджер с вами свяжется! </p>',
]);
?>

<?php
$form = ActiveForm::begin([
            'id' => 'order-form',
//            'enableClientValidation' => true,
            'validationUrl' => '/forms/default/order-v',
            'enableAjaxValidation' => true,
        ]);
?>
<div class="text-left">
    <?= $form->field($model, 'name')->textInput() ?>
    <?=
    $form->field($model, 'phone')->widget(MaskedInput::className(), [
        'mask' => '+7 (999) 999-9999',
        'options' => ['placeholder' => 'Телефон', 'class' => 'form-control'],
    ])
    ?>
    <?= $form->field($model, 'comment')->textArea(['rows' => 4]) ?>
    <?= $form->field($model, 'title')->hiddenInput()->label(false) ?>

    <p class="politic-text">Нажимая кнопку «Отправить» Вы соглашаетесь с
        <a href="/o-kompanii/dokumenty/politika-obrabotki-personal-nyh-dannyh">политикой конфиденциальности</a> сайта.</p>

</div>
<div class="form-group">
    <?= Html::submitButton('Отправить', [
        'onClick' => "ym(53972095,'reachGoal','zakaz')",
        'class' => 'btn btn-yellow']) ?>
</div>

<?php
ActiveForm::end();

Modal::end();
?>



