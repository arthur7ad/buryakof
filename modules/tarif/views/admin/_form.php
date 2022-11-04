<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\tarif\models\Tarif */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarif-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sys_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
