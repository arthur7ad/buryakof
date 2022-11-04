<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\page\models\Page */

$this->title = Yii::t('app', 'Update Page: {name}', [
            'name' => $model->header,
        ]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form_city_content', [
        'model' => $model,
        'url' => $url,
        'city_id' => $city_id,
    ])
    ?>

</div>
