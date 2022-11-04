<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\utp\models\Utp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="utp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'is_enable')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
