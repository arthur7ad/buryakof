<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\user\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',

            [
                'label' => 'Установить пароль',
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'password',
                'format' => 'raw',
                'value' => function($row) {
                    return '<i class="glyphicon glyphicon-lock"></i>';
                },
                'editableOptions' => [
                    'header' => 'Пароль',
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                    'options' => [
                        'pluginOptions' => ['min' => 0, 'max' => 5000]
                    ],
                    'formOptions' => ['action' => ['edit_pass']]
                ],
            ],
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email:email',
            //'role',
            //'status',
            'created_at',
//            'last_login',
            //'updated_at',
            //'md5',
            //'user_group_id',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
        ],
    ]);
    ?>
</div>
