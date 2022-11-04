<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\form\ActiveForm;
?>

<div class="calc">

    <?php
    $form = ActiveForm::begin([
                'id' => 'local-calc',
//                'enableClientValidation' => true,
                'validationUrl' => '/calc/default/validate-local',
                'enableAjaxValidation' => true,
    ]);
    ?>

    <p class="h2">Рассчитать стоимость<br/> перевозки</p>

    <?php
    $form->field($model, 'from')->widget(\kartik\select2\Select2::classname(), [
        'data' => app\modules\city\models\City::getAllNames(),
        'options' => ['placeholder' => 'Город отправления', 'multiple' => false],
    ])->label(false);
    ?>

    <?php
    $form->field($model, 'to')->widget(\kartik\select2\Select2::classname(), [
        'data' => app\modules\city\models\City::getAllNames(),
        'options' => ['placeholder' => 'Город прибытия', 'multiple' => false],
    ])->label(false);
    ?>

        <?= $form->field($model, 'rast')->textInput() ?>

    <?= $form->field($model, 'type_tc')->radioButtonGroup($model->_type_tc) ?>
    <?= $form->field($model, 'type_load')->radioButtonGroup($model->_type_load) ?>
    <?= $form->field($model, 'tonnazh')->radioButtonGroup($model->_tonnazh) ?>
    <?= $form->field($model, 'prim')->radioButtonGroup($model->_prim) ?>
    <?= $form->field($model, 'summ')->hiddenInput()->label(false) ?>
    <?php $form->field($model, 'rast')->hiddenInput()->label(false) ?>


    <div class="form-group">
        <?=
        Html::submitButton('Рассчитать стоимость', [
            'class' => 'btn btn-scelet center-block calc-btn',
//            'onClick' => 'Calc.Result()'
        ])
        ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>

<?php
Modal::begin([
    'id' => 'calc-result-modal',
    'header' => '<p class="h2 text-center">Результаты расчёта</p>',
    'class' => 'text-left'
]);


Modal::end();
?>


<?= app\modules\forms\widgets\CalcModal::widget(); ?>




