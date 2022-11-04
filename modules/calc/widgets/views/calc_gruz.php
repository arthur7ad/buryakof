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

$lat = $cityModel->latitude;
$long = $cityModel->longitude;
?>

<script type="text/javascript">

    Calc.lat = Calc.lat = <?= $lat ?>;
    Calc.long = Calc.long = <?= $long ?>;


</script>

<div class="calc">

    <?= $this->render('_menu', ['type' => $type]) ?>

    <div id="gruz">

        <div class="row">


            <div class="col-xs-12">
                <?= app\modules\autopark\widgets\CalcSlider::widget() ?>
            </div>


            <div class="col-xs-12 col-sm-4">

                <?php
                $form = ActiveForm::begin([
                            'id' => 'gruz-calc',
//                'enableClientValidation' => true,
                            'validationUrl' => '/calc/default/gruz-calc-validate',
                            'enableAjaxValidation' => true,
                ]);
                ?>

                <?=
                $form->field($model, 'car')->hiddenInput([
                    'class' => 'car-name'
                ])->label(false);
                ?>
                <?=
                $form->field($model, 'summ')->hiddenInput([
                    'class' => 'form-summ'
                ])->label(false);
                ?>

                <?=
                $form->field($model, 'from')->textInput([
                    'onkeypress' => 'Calc.findAddress($(this).val(), "calcform-from" )',
                    'list' => 'calcform-from-list',
                ])
                ?>

                <datalist id="calcform-from-list">
                </datalist>


                <?=
                $form->field($model, 'to')->textInput([
                    'onkeypress' => 'Calc.findAddress($(this).val(), "calcform-to")',
                    'list' => 'calcform-to-list',
                ])
                ?>

                <datalist id="calcform-to-list">
                </datalist>


                <?=
                $form->field($model, 'poputno', [
                    'checkboxTemplate' => "<div class=\"checkbox disabled\">\n{beginLabel}\n{input}\n<span>{labelTitle}</span>\n{endLabel}\n{error}\n{hint}\n</div>",
                ])->checkbox([
                    'disabled' => true,
                    'onChange' => 'Calc.CalcPoputno()',
                ])->label('Попутно', ['class' => 'custom-checkbox'])
                ?>

                <div class="price-wrap">
                    Итого: <span class="price">0</span> Р
                </div>


                <?=
                Html::button('Рассчитать стоимость', [
                    'class' => 'btn btn-yellow shadow calc-btn',
                    'onClick' => "Calc.Calc(); ym(53972095,'reachGoal','calc')",
                ])
                ?>

                <?= $form->field($model, 'name')->textInput() ?>

                <?=
                $form->field($model, 'phone')->widget(MaskedInput::className(), [
                    'mask' => '+7 (999) 999-9999',
                    'options' => ['placeholder' => 'Телефон', 'class' => 'form-control'],
                ])
                ?>


                <div class="form-group">
                    <?=
                    Html::submitButton('Заказать', [
                        'class' => 'btn btn-yellow shadow',
                        'onClick' => "ym(53972095,'reachGoal','calc_zakaz')"
                    ])
                    ?>
                </div>

                <p class="text-muted" style="font-size: 1.3rem; line-height: 2rem;">Обращаем ваше внимание, что расчет является ориентировочным. Нажимая кнопку «Отправить» Вы соглашаетесь с политикой конфиденциальности сайта.</p>

                <?php ActiveForm::end(); ?>

            </div>
            <div class="col-xs-12 col-sm-8">
                <div id="map" style="width: 100%; height: 700px">

                    <div class="tarif-wrap hidden-xs">
                        <div class="tarif tarif1">
                            <p class="title">Город</p>
                            <p><span class="price"></span></p>
                            <?=
                            Html::a('Заказать', 'javascript:void(0);', [
                                'class' => "btn ",
                                'data-toggle' => "modal",
                                'data-target' => "#order-modal",
                                'data-title' => 'Заказ c карты ',
                                'onClick' => "ym(53972095,'reachGoal','map')"
//                    'onClick' => '$("#order-form #order-type").val($(this).attr("data-type"))',
                            ])
                            ?>
                        </div>
                        <div class="tarif tarif2">
                            <p class="title">Пригород</p>
                            <p> <span class="price"></span></p>
                            <?=
                            Html::a('Заказать', 'javascript:void(0);', [
                                'class' => "btn ",
                                'data-toggle' => "modal",
                                'data-target' => "#order-modal",
                                'data-title' => 'Заказ c карты ',
                                'onClick' => "ym(53972095,'reachGoal','map')"
//                    'onClick' => '$("#order-form #order-type").val($(this).attr("data-type"))',
                            ])
                            ?>
                        </div>
                        <div class="tarif tarif3">
                            <p class="title">Область</p>
                            <p><span class="price"></span></p>
                            <?=
                            Html::a('Заказать', 'javascript:void(0);', [
                                'class' => "btn ",
                                'data-toggle' => "modal",
                                'data-target' => "#order-modal",
                                'data-title' => 'Заказ c карты ',
                                'onClick' => "ym(53972095,'reachGoal','map')"
//                    'onClick' => '$("#order-form #order-type").val($(this).attr("data-type"))',
                            ])
                            ?>
                        </div>
                        <div class="tarif tarif4">
                            <p class="title">Россия</p>
                            <p><span class="price"></span></p>
                                <?=
                                Html::a('Заказать', 'javascript:void(0);', [
                                    'class' => "btn ",
                                    'data-toggle' => "modal",
                                    'data-target' => "#order-modal",
                                    'data-title' => 'Заказ c карты ',
                                    'onClick' => "ym(53972095,'reachGoal','map')"
//                    'onClick' => '$("#order-form #order-type").val($(this).attr("data-type"))',
                                ])
                                ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>