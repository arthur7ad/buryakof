<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use vova07\fileapi\Widget as FileAPI;
?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-xs-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

            <?=
            $form->field($model, 'date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => ''],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]);
            ?>

            <?= $form->field($model, 'is_enable')->checkbox() ?>
        </div>
        <div class="col-xs-6">
            <?php
            echo $form->field($model, 'image')->widget(
                    FileAPI::className(), [
                'settings' => [
                    'url' => ['/review/admin/upload-image']
                ]
                    ]
            );
            ?>
            <?php
            echo $form->field($model, 'avatar')->widget(
                    FileAPI::className(), [
                'settings' => [
                    'url' => ['/review/admin/upload-image']
                ]
                    ]
            );
            ?>
        </div>
    </div>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
