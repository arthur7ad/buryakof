<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\clients\models\Clients */

$this->title = Yii::t('app', 'Добавить отзыв');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Группы отзывов'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autopark-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_element', [
        'model' => $model,
    ]) ?>

</div>
