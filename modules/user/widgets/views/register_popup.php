<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
?>

<?php
Modal::begin([
    'id' => 'register-popup-modal',
    'header' => '<p class="title">Регистрация</p>',
//    'options' => ['class' => 'container text-left'],
//    'toggleButton' => ['label' => 'Задать вопрос о товаре', 'class' => 'btn btn-default'],
]);
?>

<div class="login-form">


    <?php
    $form = ActiveForm::begin([
                'id' => 'form-signup',
                'action' => 'register',
    ]);
    ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'passwordConfirmation')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Зарегестрироваться'), ['class' => 'btn btn-yellow', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php Modal::end(); ?>
