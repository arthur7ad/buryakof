<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\page\models\Page */

$this->title = Yii::t('app', 'Добавить лендинг');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Лэндинги'), 'url' => ['subdomain']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form_subdomain', [
        'model' => $model,
        'url' => $url,
    ])
    ?>

</div>
