<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\page\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>



    <div class="row">
        <div class="col-xs-8">

            <?= $form->field($model, 'subdomain')->textInput() ?>

            <?=
            $form->field($model, 'header')->textInput([
                'maxlength' => true,
//                'onChange' => 'Url.changeHeader($(this));'
            ])
            ?>

            <?=
            $this->render('@app/views/section/vRedactor', [
                'model' => $model,
                'form' => $form,
                'name' => 'content',
            ]);
            ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

        </div>
        <div class="col-xs-4">

            <?= $form->field($url, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($url, 'description')->textInput(['maxlength' => true]) ?>       

        </div>

    </div>





    <?php ActiveForm::end(); ?>
</div>
