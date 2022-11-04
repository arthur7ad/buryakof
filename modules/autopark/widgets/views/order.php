<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;

$this->registerJsFile('@web/js/forms.js', ['depends' => ['app\assets\AppAsset']]);
?>

<?php
Modal::begin([
    'id' => 'order-car-modal',
    'header' => '<p class="h2 text-center">Оставьте ваши контактные данные. Наш менеджер с вами свяжется! </p>',
]);
?>

<?php
$form = ActiveForm::begin([
            'id' => 'order-car-form',
        ]);
?>
<div class="text-left">
    <?= $form->field($model, 'car_name')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'name')->textInput() ?>
    <?=
    $form->field($model, 'phone')->widget(MaskedInput::className(), [
        'mask' => '+7 (999) 999-9999',
        'options' => ['placeholder' => 'Телефон', 'class' => 'form-control'],
    ])
    ?>
    <?= $form->field($model, 'comment')->textArea(['rows' => 3]) ?>
    <?= $form->field($model, 'accept')->checkbox() ?>
</div>
<div class="form-group">
    <?= Html::submitButton('Отправить заявку', ['class' => 'btn btn-yellow shadow center-block']) ?>
</div>

<p><span class="text-danger">*</span>поле обязательно для заполнения</p>

<?php
ActiveForm::end();

Modal::end();
?>



