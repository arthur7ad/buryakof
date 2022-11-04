<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Slider */

$this->title = Yii::t('app', 'Создать данные слайда в городе ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Слайды'), 'url' => ['admin/update', 'id' => $id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_city', [
        'model' => $model,
    ]) ?>

</div>
