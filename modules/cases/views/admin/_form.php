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
            <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Название') ?>
            <?=
            $form->field($model, 'cities')
                ->dropDownList(\app\modules\city\models\City::getActiveCity(),
                    [
                        'multiple'=>'multiple',
                        'class'=>'chosen-select input-md required',
                    ]
                )->label('Город');
            ?>
            <?=
            $form->field($model, 'galery')
                ->dropDownList(\app\modules\galery\models\Galery::getGaleries(),
                    [
                        'class'=>'chosen-select input-md required',
                    ]
                )->label('Галерея');
            ?>
            <?php
            echo $form->field($model, 'image')->widget(
                    FileAPI::className(), [
                'settings' => [
                    'url' => ['/site/file-img-upload']
                ]
                    ]
            )->label('Изображение');
            ?>
            <?=
            $form->field($model, 'description')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'imageUpload' => Url::to(['/site/image-upload']),
                    'minHeight' => 140,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'fontcolor',
                    ],
                    'replaceDivs' => false,
                    'deniedTags' => ['style']
                ]
            ]);
            ?>
            <?=
            $form->field($url, 'url')
                ->textInput([
                    'maxlength' => true, 'placeholder' => 'Url'])
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
