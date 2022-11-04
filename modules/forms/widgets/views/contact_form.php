<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;


$this->registerJsFile('@web/js/form/contact_form.js', ['depends' => ['app\assets\AppAsset']]);
$this->registerCssFile('/css/kontakty-form.css');
?>

<div class="contact-form">

    <p class="title"><?= $title ?></p>

    <?php $form = ActiveForm::begin(['id' => 'contact-form', 'enableClientValidation' => true,]); ?>

    <?=
    $form->field($model, 'name')->textInput([
        'placeholder' => $model->getAttributeLabel('name')
    ])->label(false)
    ?>
    <?=
    $form->field($model, 'email')->textInput([
        'placeholder' => $model->getAttributeLabel('email')
    ])->label(false)
    ?>
    <?=
    $form->field($model, 'message')->textarea([
        'placeholder' => $model->getAttributeLabel('message'),
        'rows' => 8,
    ])->label(false)
    ?>

    <p class="politic-text">Нажимая кнопку «Отправить» Вы соглашаетесь с
        <a href="/o-kompanii/dokumenty/politika-obrabotki-personal-nyh-dannyh">политикой конфиденциальности</a> сайта.</p>

    <div class="form-group button-wrap">
        <?=
        Html::submitButton('Отправить заявку', [
            'onClick' => "ym(53972095,'reachGoal','kontakt')",
            'class' => 'btn btn-yellow shadow'])
        ?>
    </div>
</div>


<?php
ActiveForm::end();
?>



