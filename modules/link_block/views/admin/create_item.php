<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\tarif\models\Tarif */

$this->title = Yii::t('app', 'Create Tarif');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Link Blocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Элементы', 'url' => ['index-item', 'id' => $linkblock->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarif-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form_item', [
        'model' => $model,
    ])
    ?>

</div>
