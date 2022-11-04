<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Слайды');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Slide'), ['create',], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
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
                'attribute' => 'page',
                'filter' => \app\modules\page\models\Page::__getUrls(),
                'value' => function($row) {
                    $result = '';

                    if ($row->pages) {
                        foreach ($row->pages as $item):

                            $page = \app\models\Page::findOne($item);

                            $result .= $page->url->url . ' — ';
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
            ],
        ],
    ]);
    ?>
</div>
