<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Slider */

$this->title = 'Update Slider: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Данные слайда в городах'), 'url' => ['admin/cities', 'id' => $id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slider-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form_city', [
        'model' => $model,
    ]) ?>

</div>
