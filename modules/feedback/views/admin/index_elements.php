<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\autopark\models\AutoparkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Отзывы '.$feedback->name );
$this->params['breadcrumbs'][] = 'Модули';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $feedback->name), 'url' => ['index', 'id' => $feedback->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autopark-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'добавить отзыв'), ['create-element', 'id' => $feedback_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'text',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function($row) {
                    return Html::img($row->getImg(),['height' => '200px']);
                },
            ],

            ['class' => 'yii\grid\ActionColumn', 'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                            Url::to(['delete-element', 'id' => $model->id]));
                    },
                ],
            ],
        ],
    ]);
    ?>
</div>
