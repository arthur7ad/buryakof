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

    <?= $form->field($model, 'link_block_id')->hiddenInput()->label(false) ?>


    <?=
    $form->field($model, 'url_id')->widget(\kartik\select2\Select2::classname(), [
        'data' => \app\modules\url\models\Url::getUrlPageList(),
        'options' => [
//            'placeholder' => 'Родительская страница',
            'multiple' => false,
            'class' => 'form-control',
        ],
    ]);
    ?>

    <?php
    echo $form->field($model, 'icon')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
//        'aspectRatio' => (16 / 9), //set the aspect ratio
        'showPreview' => true, //false to hide the preview
        'showDeletePickedImageConfirm' => false, //on true show warning before detach image
    ]);
    ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'order')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
