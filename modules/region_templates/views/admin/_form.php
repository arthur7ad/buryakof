<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\region_templates\models\RegionTemplates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="region-templates-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city_id')->dropDownList(app\modules\city\models\City::getActiveCity()) ?>

    <?= $form->field($model, 'name')->dropDownList(app\modules\shortcode\models\Shortcode::getList()) ?>


    <?=
    $form->field($model, 'url')->widget(\kartik\select2\Select2::classname(), [
        'data' => app\modules\url\models\Url::__getForList(),
        'options' => [
            'placeholder' => 'Url',
            'multiple' => false,
            'class' => 'form-control',
        ],
    ])->label('Url');
    ?>

    <?=
    $form->field($model, 'domain')->widget(\kartik\select2\Select2::classname(), [
        'data' => app\modules\page\models\Page::__getLandingList(),
        'options' => [
            'placeholder' => 'Домен',
            'multiple' => false,
            'class' => 'form-control',
        ],
    ])->label('Домен');
    ?>

    <?= $form->field($model, 'ad')->textInput() ?>

    <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
