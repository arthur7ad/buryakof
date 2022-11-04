<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\page\models\PageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'header') ?>

    <?= $form->field($model, 'content') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'is_enable') ?>

    <?php // echo $form->field($model, 'url_id') ?>

    <?php // echo $form->field($model, 'page_en_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
