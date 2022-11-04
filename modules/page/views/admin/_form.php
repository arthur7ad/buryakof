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

            <?= $form->field($model, 'name')->textInput() ?>
            <?= $form->field($model, 'has_clients')->checkbox()->label('Показывать клиентов') ?>
            <?=
            $form->field($model, 'cases')
                ->dropDownList(\app\modules\cases\models\Cases::getCases(),
                    [
                        'multiple'=>'multiple',
                        'class'=>'chosen-select input-md required',
                    ]
                )->label('Кейсы для показа');
            ?>
            <?=
            $form->field($model, 'galery')
                ->dropDownList(\app\modules\galery\models\Galery::getGaleries(),
                    [
                        'class'=>'chosen-select input-md required',
                    ]
                )->label('Галерея для показа');
            ?>
            <?=
            $form->field($model, 'feedback')
                ->dropDownList(\app\modules\feedback\models\Feedback::getFeedbacks(),
                    [
                        'class'=>'chosen-select input-md required',
                    ]
                )->label('Отзывы для показа');
            ?>
            <?=
            $form->field($model, 'header')->textInput([
                'maxlength' => true,
                'onChange' => 'Url.changeHeader($(this));'])
            ?>

            <?=
            $form->field($model, 'parent_id')->widget(\kartik\select2\Select2::classname(), [
                'data' => [0 => 'Нет'] + \app\modules\page\models\Page::__getHeaders(),
                'options' => [
                    'placeholder' => 'Родительская страница',
                    'multiple' => false,
                    'class' => 'form-control',
                    'onChange' => 'Url.changeParent($(this));'
                ],
            ])->label('Родительская страница');
            ?>

            <?=
                    $form->field($url, 'url')
                    ->textInput([
                        'maxlength' => true, 'placeholder' => 'Url'])
            ?>


            <?=
            $this->render('@app/views/section/vRedactor', [
                'model' => $model,
                'form' => $form,
                'name' => 'content',
            ]);
            ?>

            <?=
            $this->render('@app/views/section/vRedactor', [
                'model' => $model,
                'form' => $form,
                'name' => 'content_seo_1',
            ]);
            ?>

            <?=
            $this->render('@app/views/section/vRedactor', [
                'model' => $model,
                'form' => $form,
                'name' => 'content_seo_2',
            ]);
            ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

        </div>
        <div class="col-xs-4">


            <?= $form->field($url, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($url, 'description')->textInput(['maxlength' => true]) ?>

            <hr/>

            <?=
            $form->field($model, 'template')->widget(\kartik\select2\Select2::classname(), [
                'data' => $model::LAYOUT,
                'options' => [
                    'placeholder' => 'Шаблон',
                    'multiple' => false,
                    'class' => 'form-control',
                ],
            ])->label('Шаблон');
            ?>

        </div>

    </div>





    <?php ActiveForm::end(); ?>
</div>
