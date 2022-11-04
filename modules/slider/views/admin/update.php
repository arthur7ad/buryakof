<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Slider */

$this->title = 'Update Slider: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Слайды'), 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slider-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <a href="/slider/admin/cities/<?=$model->id?>">Данные по городам</a>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
