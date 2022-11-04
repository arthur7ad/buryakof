<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use vova07\fileapi\Widget as FileAPI;
?>

<div class="portfolio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'anons')->textarea() ?>

    <?php
    echo $form->field($model, 'image')->widget(
            FileAPI::className(), [
        'settings' => [
            'url' => ['/portfolio/admin/upload-image']
        ]
            ]
    );
    ?>


    <?=
    $form->field($model, 'date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
