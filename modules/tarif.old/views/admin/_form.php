<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\tarif\models\Tarif */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarif-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'from_id')->textInput() ?>

    <?= $form->field($model, 'to_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 't2_otdelno')->textInput() ?>

    <?= $form->field($model, 't2_dogruz')->textInput() ?>

    <?= $form->field($model, 't5_otdelno')->textInput() ?>

    <?= $form->field($model, 't5_dogruz')->textInput() ?>

    <?= $form->field($model, 't10_otdelno')->textInput() ?>

    <?= $form->field($model, 't10_dogruz')->textInput() ?>

    <?= $form->field($model, 't20_otdelno')->textInput() ?>

    <?= $form->field($model, 't20_dogruz')->textInput() ?>

    <?= $form->field($model, 'trall_otdelno')->textInput() ?>

    <?= $form->field($model, 'trall_dogruz')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
