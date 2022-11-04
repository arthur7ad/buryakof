<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\file\FileInput;

//$this->registerJsFile('@web/js/form/blanket_order.js', ['position' => \yii\web\View::POS_BEGIN]);
//$this->registerJsFile('@web/js/form/blanket_order.js', ['depends' => ['app\assets\AppAsset']]);
$this->registerCss(file_get_contents(Yii::getAlias('@app/modules/forms/assets/css/blanket-order.css')));
?>

<div class="blanket-order-title-wrap">
    <div class="container">
        <div class="h2 header-line">ОБРАТНАЯ СВЯЗЬ</div>
    </div>
</div>

<div class="blanket-order">

    <div class="container">

        <?php
        $form = ActiveForm::begin([
                    'id' => 'blanket-order-form',
                    'action' => '/forms/default/blanket-order',
//            'enableClientValidation' => true,
                    'validationUrl' => '/forms/default/blanket-order-v',
                    'enableAjaxValidation' => true,
                    'options' => [
                        'enctype' => 'multipart/form-data'
                    ]
        ]);
        ?>

        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-7 title">
                При заказе с сайта - <span class="yellow">СКИДКА 5%</span>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-7">

                <?=
                $form->field($model, 'name')->textInput([
                    'placeholder' => 'Вашe имя'
                ])->label(false)
                ?>
                <?=
                $form->field($model, 'phone')->widget(MaskedInput::className(), [
                    'mask' => '+7 (999) 999-9999',
                    'options' => ['placeholder' => 'Ваш телефон', 'class' => 'form-control'],
                ])->label(false)
                ?>

                <div class="row">

                    <div class="col-xs-12 col-sm-8 col-md-8">
                        <?=
                        $form->field($model, 'comment')->textArea([
                            'rows' => 5,
                            'placeholder' => 'Ваш комментарий'
                        ])->label(false)
                        ?>

                        <p class="politic-text">Нажимая кнопку «Отправить» Вы соглашаетесь с
                            <a href="/o-kompanii/dokumenty/politika-obrabotki-personal-nyh-dannyh">политикой конфиденциальности</a> сайта.</p>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4">

                        <div class="form-group">


                            <?=
                            $form->field($model, 'fileDoc')->widget(FileInput::classname(), [
                                'options' => ['multiple' => false],
                                'pluginOptions' => [
                                    'showPreview' => false,
                                    'showCaption' => false,
                                    'showRemove' => false,
                                    'showUpload' => false,
                                    'browseClass' => 'btn btn-yellow-skelet',
                                    'browseIcon' => '',
                                    'browseLabel' => 'Прикрепить файл'
                                ],
                                'options' => [
                                    'class' => 'btn btn-yellow-skelet'
                                ],
                                'pluginEvents' => [
                                    "change" => "function() {  FuckButton($(this)); }",
                                ],
                            ])->label(false);
                            ?>

                        </div>

                        <div class="form-group">
                            <?= Html::submitButton('Отправить заявку', [
                                'onClick' => "ym(53972095,'reachGoal','ras_forma')",
                                'class' => 'btn btn-yellow shadow']) ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <?php
        ActiveForm::end();
        ?>

    </div>
</div>



