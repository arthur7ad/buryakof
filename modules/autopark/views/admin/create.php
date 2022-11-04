<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\autopark\models\Autopark */

$this->title = Yii::t('app', 'Create Autopark');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Autoparks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autopark-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
