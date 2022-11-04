<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\tarif\models\TarifSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarif-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'from_id') ?>

    <?= $form->field($model, 'to_id') ?>

    <?= $form->field($model, 't2_otdelno') ?>

    <?= $form->field($model, 't2_dogruz') ?>

    <?php // echo $form->field($model, 't5_otdelno') ?>

    <?php // echo $form->field($model, 't5_dogruz') ?>

    <?php // echo $form->field($model, 't10_otdelno') ?>

    <?php // echo $form->field($model, 't10_dogruz') ?>

    <?php // echo $form->field($model, 't20_otdelno') ?>

    <?php // echo $form->field($model, 't20_dogruz') ?>

    <?php // echo $form->field($model, 'trall_otdelno') ?>

    <?php // echo $form->field($model, 'trall_dogruz') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
