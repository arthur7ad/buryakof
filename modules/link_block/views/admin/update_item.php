<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\tarif\models\Tarif */

$this->title = Yii::t('app', 'Update Tarif: {name}', [
            'name' => $model->name,
        ]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Link Blocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['index-item', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tarif-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form_item', [
        'model' => $model,
    ])
    ?>

</div>
