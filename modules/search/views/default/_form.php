<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\robots\models\Robots */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="search-form">

    <?php
    $form = ActiveForm::begin([
                'method' => 'get',
                'options' => [
                    'class' => 'form-inline'
                ],
//                'type' => 'get',
    ]);
    ?>

    <div class="form-group">


        <?= Html::input('input', 'query', isset($query) ? $query : '', ['class' => 'form-control']) ?>

        <div class="form-group">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
