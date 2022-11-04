<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\news\models\News */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Администратор';
?>
<div class="news-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form_update', [
        'model' => $model,
    ])
    ?>

</div>
