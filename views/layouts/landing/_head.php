<?php

use yii\bootstrap\Html;
?>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php //echo $model->render('_header_meta') ?>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($model->title) ?></title>
    <?php $model->head() ?>
</head>
