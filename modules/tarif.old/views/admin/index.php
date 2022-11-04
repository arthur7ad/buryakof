<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\tarif\models\TarifSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tarifs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarif-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <div class="row">
        <div class="col-xs-5">
            <?= Html::a(Yii::t('app', 'Create Tarif'), ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="col-xs-3">
        </div>
        <div class="col-xs-2">
            <!--Экспорт-->
            <?php
            ExportMenu::widget([
                'filename' => 'redirects',
                'dataProvider' => $dataProvider,
                'columns' => [
                    'id',
                    'old_url',
                    'new_url',
                    'is_enable',
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_PDF => false,
                    ExportMenu::FORMAT_CSV => false,
                    ExportMenu::FORMAT_EXCEL => true,
                    ExportMenu::FORMAT_HTML => false,
                ],
            ]);
            ?>
        </div>
        <div class="col-xs-2">
            <?= Html::a(Yii::t('app', 'Import'), ['import'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'label' => 'Г. Отпр.',
                'attribute' => 'from_id',
                'filter' => app\modules\city\models\City::getActiveCity(),
                'value' => 'fromCity.name',
            ],
            [
                'label' => 'Г. Назн.',
                'attribute' => 'to_id',
                'filter' => app\modules\city\models\City::getActiveCity(),
                'value' => 'toCity.name',
            ],
            [
                'label' => 'Г 2т О',
                'attribute' => 't2_otdelno',
            ],
            [
                'label' => 'Г 2т Д',
                'attribute' => 't2_dogruz',
            ],
            [
                'label' => '5т О',
                'attribute' => 't5_otdelno',
            ],
            [
                'label' => '5т Д',
                'attribute' => 't5_dogruz',
            ],
            [
                'label' => '10т О',
                'attribute' => 't10_otdelno',
            ],
            [
                'label' => '10т Д',
                'attribute' => 't10_dogruz',
            ],
            [
                'label' => '20т О',
                'attribute' => 't20_otdelno',
            ],
            [
                'label' => '20т Д',
                'attribute' => 't20_dogruz',
            ],
            [
                'label' => 'Тралл О',
                'attribute' => 'trall_otdelno',
            ],
            [
                'label' => 'Тралл Д',
                'attribute' => 'trall_dogruz',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
