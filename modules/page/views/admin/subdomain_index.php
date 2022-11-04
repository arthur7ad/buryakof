<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\page\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Лэндинг');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить лендинг'), ['subdomain-create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'subdomain',
            'header',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a(
                                        '<span class="glyphicon glyphicon-pencil"></span>',
                                        Url::to(['update-subdomain', 'id' => $model->id]));
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                                        Url::to(['delete-subdomain', 'id' => $model->id]));
                    },
                ],
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
