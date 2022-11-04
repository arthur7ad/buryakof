<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use yii\widgets\MaskedInput;
?>
<div class="site-changePassword">

    <?php $form = ActiveForm::begin(['id' => 'user-form']); ?>
    <div class="row">
        <div class="col-xs-12">

            <?= $form->field($model, 'email')->textInput() ?>

            <?= $form->field($model, 'username')->textInput() ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'password_repeat')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary', 'name' => 'changePassword-button']) ?>
            </div>

        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
