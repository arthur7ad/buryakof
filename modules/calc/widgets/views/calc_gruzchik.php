<?php

use yii\helpers\Html;
//use kartik\form\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

$this->registerJsFile('/js/calc/Calc.js', ['position' => \yii\web\View::POS_HEAD]);

$get = Yii::$app->request->get();

if (isset($get['calc']))
    $this->registerJs('$("html, body").animate({scrollTop: $(".calc").offset().top + "px"});');

$cityModel = Yii::$app->city->model;
?>


<div class="calc">

    <?= $this->render('_menu', ['type' => $type]) ?>

    <div id="gruzchik">

        <div class="row">
            <?php
            $form = ActiveForm::begin([
                        'id' => 'gruzchik-calc',
//                        'enableClientValidation' => true,
//                        'validationUrl' => '/calc/default/gruzchik-calc-validate',
//                        'enableAjaxValidation' => false,
            ]);
            ?>

            <?=
            $form->field($model, 'summ')->hiddenInput([
                'class' => 'form-summ'
            ])->label(false);
            ?>


            <div class="col-xs-12 col-sm-6">
                <?=
                $form->field($model, 'time')->dropDownList($model::TIME, [
                    'onChange' => "GruzchikiCalc();ym(53972095,'reachGoal','calc_gruz')",
                ]);
                ?>
            </div>

            <div class="col-xs-12 col-sm-6">
                <?=
                $form->field($model, 'count')->dropDownList($model::COUNT, [
                    'onChange' => "GruzchikiCalc(); ym(53972095,'reachGoal','calc_gruz')",
                ]);
                ?>
            </div>
        </div>
        <div class="row">

            <div class="col-xs-12 col-sm-4">
                <?=
                $form->field($model, 'is_instrument', [
                    'checkboxTemplate' => "<div class=\"checkbox\">\n{beginLabel}\n{input}\n<span>{labelTitle}</span>\n{endLabel}\n{error}\n{hint}\n</div>",
                ])->checkbox([
                    'onChange' => "GruzchikiCalc(); ym(53972095,'reachGoal','calc_gruz')",
                ])->label('Нужны инструменты', ['class' => 'custom-checkbox'])
                ?>

            </div>
            <div class="col-xs-12 col-sm-4">
                <?=
                $form->field($model, 'is_remni', [
                    'checkboxTemplate' => "<div class=\"checkbox\">\n{beginLabel}\n{input}\n<span>{labelTitle}</span>\n{endLabel}\n{error}\n{hint}\n</div>",
                ])->checkbox([
                    'onChange' => "GruzchikiCalc(); ym(53972095,'reachGoal','calc_gruz')",
                ])->label('Нужны ремни', ['class' => 'custom-checkbox'])
                ?>

            </div>
            <div class="col-xs-12 col-sm-4">
                <?=
                $form->field($model, 'is_rohlia', [
                    'checkboxTemplate' => "<div class=\"checkbox\">\n{beginLabel}\n{input}\n<span>{labelTitle}</span>\n{endLabel}\n{error}\n{hint}\n</div>",
                ])->checkbox([
                    'onChange' => "GruzchikiCalc(); ym(53972095,'reachGoal','calc_gruz')",
                ])->label('Нужна рохля', ['class' => 'custom-checkbox'])
                ?>

            </div>
        </div>
        <div class="row">

            <div class="col-xs-12 col-sm-6">
                <?=
                $form->field($model, 'name')->textInput([
                    'placeholder' => 'Имя'
                ])
                ?>
            </div>

            <div class="col-xs-12 col-sm-6">

                <?=
                $form->field($model, 'phone')->widget(MaskedInput::className(), [
                    'mask' => '+7 (999) 999-9999',
                    'options' => ['placeholder' => 'Телефон', 'class' => 'form-control'],
                ])
                ?>

            </div>
        </div>
        <div class="row">

            <div class="col-xs-12 col-sm-6 text-right">
                <ps class="price-wrap">Итого: 
                    <span class="price">

                        <span id="gruzchik-total-price" class="number"><?= $model->price ?>
                        </span>Р
                    </span>
                    </p>
            </div>

            <div class="col-xs-12 col-sm-6">
                <?=
                Html::submitButton('Заказать', [
                    'class' => 'btn btn-yellow shadow',
                    'onClick' => "ym(53972095,'reachGoal','calc_zakaz')"
                ])
                ?>
                <p class="text-muted" style="font-size: 1.3rem; line-height: 2rem;">
                    <br/>
                    Обращаем ваше внимание, что расчет является ориентировочным. Нажимая кнопку «Отправить» Вы соглашаетесь с политикой конфиденциальности сайта.</p>
            </div>




            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>