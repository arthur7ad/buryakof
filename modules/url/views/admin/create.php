<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\url\models\Url */

$this->title = Yii::t('app', 'Create Url');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Urls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="url-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
