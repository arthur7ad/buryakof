<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\page\models\Page */

$this->title = Yii::t('app', 'Update Page: {name}', [
            'name' => $model->id,
        ]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form_subdomain', [
        'model' => $model,
        'url' => $url,
    ])
    ?>

</div>