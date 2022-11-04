<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\fileapi\Widget as FileAPI;

/* @var $this yii\web\View */
/* @var $model app\modules\tarif\models\Tarif */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarif-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tarif_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text1')->textarea() ?>

    <?= $form->field($model, 'text2')->textarea() ?>

    <?= $form->field($model, 'text3')->textarea() ?>

    <?= $form->field($model, 'is_akcia')->checkbox() ?>


    <?php
    echo $form->field($model, 'image')->widget(
            FileAPI::className(), [
        'settings' => [
            'url' => ['/tarif/admin/image-upload']
        ]
            ]
    );
    ?>

    <?= $form->field($model, 'alt')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
