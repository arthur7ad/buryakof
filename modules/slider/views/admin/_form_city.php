<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use vova07\fileapi\Widget as FileAPI;
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?=
    $form->field($model, 'city_id')
        ->dropDownList(\app\modules\city\models\City::getActiveCity(),
            [
                'class'=>'chosen-select input-md required',
            ]
        );

    ?>

    <?= $form->field($model, 'top_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_enable')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
