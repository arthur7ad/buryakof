<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\helpers\Url;
use vova07\fileapi\Widget as FileAPI;
?>

<div class="autopark-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-xs-6">
            <?= $form->field($model, 'feedback_id')->hiddenInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Название') ?>
            <?= $form->field($model, 'text')->textInput(['maxlength' => true])->label('Текстовое описание') ?>
            <?= $form->field($model, 'youtube')->textInput(['maxlength' => true])->label('Код с Youtube (формат https://www.youtube.com/watch?v=C3lWwBslWqg)') ?>

            <?php
            echo $form->field($model, 'image')->widget(
                FileAPI::className(), [
                    'settings' => [
                        'url' => ['/site/file-img-upload']
                    ]
                ]
            )->label('Изображение отзыва');
            ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>
