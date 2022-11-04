<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Слайд в городах');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Слайд'), 'url' => ['admin/update', 'id' => $id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить данные по городу слайда'), ['createcity','id' => $id], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-pencil"></span>',
                            ['updatecity', 'id' => $model->id]);
                    },

                ],
            ],
            [
                'label' => 'Город',
                'attribute' => 'city_id',
                'format' => 'raw',
                'value' => function($row) {
                    return \app\modules\city\models\City::getCityNameById($row->city_id);
                }

            ],
            'top_title',
            'title',
            'description',
//            'image',
//            'content:ntext',
            'is_enable:yesIco',
            // 'create_time',
            // 'update_time',

        ],
    ]);
    ?>
</div>
