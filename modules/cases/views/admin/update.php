<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\clients\models\Clients */

$this->title = Yii::t('app', 'Обновить кейс');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Кейсы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');
?>
<div class="autopark-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'url' => $url
    ]) ?>

</div>