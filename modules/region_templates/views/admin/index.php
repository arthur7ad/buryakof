<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\region_templates\models\SearchRegionTemplates */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Региональные шаблоны';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-templates-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить шаблон данных', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Очистить', ['index'], ['class' => 'btn btn-default pull-right']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'city_id',
                'filter' => \app\modules\city\models\City::__getList(),
                'filterType' => GridView::FILTER_SELECT2,
                'value' => 'city.name',
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => [
                        'width' => '200px',
                        'allowClear' => true]
                ,
                ],
            ],
            [
                'attribute' => 'name',
                'filter' => app\modules\region_templates\models\RegionTemplates::__getNames(),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => [
                        'width' => '100px',
                        'allowClear' => true],
                ],
            ],
            [
                'attribute' => 'url',
                'filter' => app\modules\region_templates\models\RegionTemplates::__getUrls(),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => [
                        'width' => '200px',
                        'allowClear' => true
                    ],
                ],
            ],
            [
                'attribute' => 'domain',
                'filter' => app\modules\page\models\Page::__getLandingList(),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => [
                        'width' => '100px',
                        'allowClear' => true
                    ],
                ],
            ],
            [
                'attribute' => 'ad',
                'filter' => app\modules\region_templates\models\RegionTemplates::__getAds(),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => [
                        'width' => '200px',
                        'allowClear' => true
                    ],
                ],
            ],
            'value:ntext',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
