<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use vova07\fileapi\Widget as FileAPI;
?>

<div class="review-form">

    <h2>Добавить отзыв</h2>

    <?php
    $form = ActiveForm::begin([
                'action' => '/review/default/add'
    ]);
    ?>

    <div class="row well">
        <div class="col-xs-12 col-sm-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('ФИО') ?>

            <?= $form->field($model, 'content')->textarea(['rows' => 6])->label('Текст отзыва') ?>

        </div>
        <div class="col-xs-6 col-sm-6">
            <?php
            echo $form->field($model, 'avatar')->widget(
                    FileAPI::className(), [
                'settings' => [
                    'url' => ['/review/admin/upload-image']
                ]
                    ]
            )->label('Фотография или логотип');
            ?>
            <?php
            echo $form->field($model, 'image')->widget(
                    FileAPI::className(), [
                'settings' => [
                    'url' => ['/review/admin/upload-image']
                ]
                    ]
            )->label('Благодарственное письмо');
            ?>
        </div>
    </div>




    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
