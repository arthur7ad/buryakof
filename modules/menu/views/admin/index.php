<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\menu\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Menu'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'menu_type',
                'filter' => \app\modules\menu\models\Menu::getType(),
                'value' => function($row) {
                    return $row->type[$row->menu_type];
                },
            ],
            'name',
            [
                'attribute' => 'parent.name',
                'label' => 'Родитель'
            ],
            'title',
            'url:url',
            'order',
            [
                'attribute' => 'is_enable',
                'value' => function($row) {
                    return $row->is_enable ? 'Да' : 'Нет';
                },
            ],
            //'order',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
