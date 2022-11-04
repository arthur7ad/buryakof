<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\tarif\models\TarifSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Элементы';
$this->params['breadcrumbs'][] = ['label' => 'Группы ссылок', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarif-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Tarif'), ['create-item', 'id' => $id], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'url.url',
            [
                'attribute' => 'icon',
                'format' => 'raw',
                'value' => function($row) {
                    return Html::img($row->image);
                },
            ],
//            'icon:image',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a(
                                        '<span class="glyphicon glyphicon-pencil"></span>',
                                        ['update-item', 'id' => $model->id]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(
                                        '<span class="glyphicon glyphicon-trash"></span>',
                                        ['delete-item', 'id' => $model->id]);
                    },
                ],
            ],
        ],
    ]);
    ?>
</div>
