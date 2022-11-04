<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\city\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create City'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
//            'cid',
//            'rid',
            'name',
            'name_eng',
            // 'latitude',
            // 'longitude',
            [
                'attribute' => 'is_enable',
                'value' => function($row) {
                    return Yii::$app->yon->get($row->is_enable);
                }
            ],
            [
                'attribute' => 'is_default',
                'value' => function($row) {
                    return Yii::$app->yon->get($row->is_default);
                }
            ],
//            'is_enable',
            // 'name_code',
            // 'name_code_2',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
        ],
    ]);
    ?>
</div>
