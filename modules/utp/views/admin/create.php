<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\utp\models\Utp */

$this->title = Yii::t('app', 'Create Utp');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Utps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
