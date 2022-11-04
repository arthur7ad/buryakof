<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sliders');
$this->params['breadcrumbs'][] = ['label' => 'Cлайдеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Slide'), ['create-item', 'slider_id' => $slider_id], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a(
                                        '<span class="glyphicon glyphicon-pencil"></span>',
                                        ['update-item', 'id' => $model->id]);
                    },
                ],
            ],
            'id',
//            'model',
            'name',
            'title',
            'description',
//            'image',
//            'content:ntext',
            'is_enable:yesIco',
            [
                'label' => 'Показывать',
                'value' => function($row) {
                    $result = '';

                    if ($row->pages) {
                        foreach ($row->pages as $item):

                            $page = \app\models\Page::findOne($item);

                            $result .= $page->header . ' — ';
                        endforeach;
                    }

                    return $result;
                }
            ],
            'ord',
            // 'create_time',
            // 'update_time',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
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
