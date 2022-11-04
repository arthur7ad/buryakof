<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use vova07\fileapi\Widget as FileAPI;
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'slider_id')->hiddenInput()->label(false) ?>

    <?=
    $form->field($model, 'pages')->widget(\kartik\select2\Select2::classname(), [
        'data' => \app\modules\page\models\Page::__getHeaders(),
        'options' => [
            'placeholder' => 'Отображать на страницах',
            'multiple' => true,
        ],
    ])->label('Отображать на страницах');
    ?>

    <?= $form->field($model, 'top_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'image')->widget(
            FileAPI::className(), [
        'settings' => [
            'url' => ['/slider/admin/slide-upload']
        ]
            ]
    );
    ?>

    <?= $form->field($model, 'is_enable')->checkbox() ?>

    <?= $form->field($model, 'ord')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
