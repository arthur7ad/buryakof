<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
?>

<?php
Modal::begin([
    'id' => 'login-popup-modal',
    'header' => '<p class="title">Личный кабинет</p>',
//    'options' => ['class' => 'container text-left'],
//    'toggleButton' => ['label' => 'Задать вопрос о товаре', 'class' => 'btn btn-default'],
]);
?>

<div class="login-form">


    <?php
    $form = ActiveForm::begin([
                'id' => 'login-form',
                'action' => '/login'
    ]);
    ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <?= Html::submitButton('Войти', ['class' => 'btn btn-yellow shadow', 'name' => 'login-button']) ?>
        </div>
        <div class="col-xs-12 col-sm-6">
            <?=
            Html::a('Регистрация', 'javascript::void(0)', [
                'data-target' => '#register-popup-modal',
                'data-toggle' => 'modal',
                'onClick' => '$("#login-popup-modal").modal("hide")',
                'class' => 'btn btn-green'
            ])
            ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php Modal::end(); ?>
