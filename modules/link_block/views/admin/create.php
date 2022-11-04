<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\link_block\models\LinkBlock */

$this->title = Yii::t('app', 'Create Link Block');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Link Blocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-block-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
