<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\link_block\models\LinkBlockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Link Blocks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-block-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Link Block'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'sys_name',
            'title',
            [
                'format' => 'raw',
                'value' => function($row) {
                    return Html::a('Ссылки', ['index-item', 'id' => $row->id]);
                }
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{delete}'],
        ],
    ]);
    ?>
</div>
