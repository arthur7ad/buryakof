<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\page\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Page'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'header',
            [
                'filter' => app\modules\page\models\Page::__getList(),
                'attribute' => 'parent_id',
                'value' => 'parent.header',
            ],
//            'content:ntext',
//            'created_at',
            [
                'attribute' => 'template',
                'filter' => app\modules\page\models\Page::LAYOUT,
                'value' => function($row) {
                    return isset(app\modules\page\models\Page::LAYOUT[$row->template]) ?
                            app\modules\page\models\Page::LAYOUT[$row->template] : '';
                }
            ],
//            'is_enable:yesIco',
            'url.url',
            //'url_id:url',
            [
                'label' => 'Содержание для поддоменов',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a('Редактировать', ['update-city-content', 'id' => $model->id, 'city_id' => 1]);
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',

            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
