<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;

//$this->registerJsFile('@web/js/forms.js', ['depends' => ['app\assets\AppAsset']]);
?>

<?php
Modal::begin([
    'id' => 'vacancy-modal',
    'header' => '<p class="h2 text-center">Оставьте ваши контактные данные. Наш менеджер с вами свяжется!  </p>',
]);
?>

<?php
$form = ActiveForm::begin([
            'id' => 'vacancy-form',
            'action' => '/forms/default/vacancy-v',
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
    <?= $form->field($model, 'vacancy')->textArea(['rows' => 3]) ?>
</div>
<p class="text-muted">
    Нажимая на кнопку «Отправить» вы соглашаетесь с <a href="/o-kompanii/dokumenty/politika-obrabotki-personal-nyh-dannyh"> политикой</a> по обработке персональных данных
</p>
<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>

<?php
ActiveForm::end();

Modal::end();
?>



