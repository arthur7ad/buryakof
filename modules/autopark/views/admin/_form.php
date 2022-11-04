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
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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
            $form->field($model, 'for')->widget(Widget::className(), [
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

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <div class="col-xs-6">

            <?php echo $form->field($model, 'price_tarif1')->textInput() ?>

            <?php echo $form->field($model, 'price_tarif2')->textInput() ?>

            <?php echo $form->field($model, 'price_km_oblast')->textInput() ?>

            <?php echo $form->field($model, 'price_km_country')->textInput() ?>


            <hr/>

            <?=
            $form->field($model, 'type')->dropDownList($model::TYPE);
            ?>

            <?php $form->field($model, 'length')->textInput() ?>

            <?php $form->field($model, 'height')->textInput() ?>

            <?php $form->field($model, 'weight')->textInput() ?>

            <?= $form->field($model, 'order')->textInput() ?>

            <?php // $form->field($model, 'price')->textInput() ?>

            <?= $form->field($model, 'volume')->textInput() ?>

            <?= $form->field($model, 'carrying')->textInput() ?>

            <?= $form->field($model, 'is_enable')->checkbox() ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
