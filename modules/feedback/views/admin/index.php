<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\autopark\models\AutoparkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Группы отзывов');
$this->params['breadcrumbs'][] = 'Модули';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autopark-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'добавить группу отзывов'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}{view}'],
            'name',
//            'image',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{delete}'],
        ],
    ]);
    ?>
</div>
