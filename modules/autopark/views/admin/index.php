<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\autopark\models\AutoparkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Autoparks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autopark-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Autopark'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
            'id',
            'name',
//            'image',
            [
                'attribute' => 'img',
                'format' => ['image', ['height' => '100']],
            ],
//            'length',
//            'height',
            'price_tarif1',
            'price_tarif2',
            'price_km_oblast',
            'price_km_country',
            //'weight',
            //'for:ntext',
            //'description:ntext',
            'order',
            //'is_enable',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{delete}'],
        ],
    ]);
    ?>
</div>
