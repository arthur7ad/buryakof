<?php
$this->title = $model->_title;
$this->params['breadcrumbs'] = $model->breadCrumbs;
$this->params['has_clients'] = $model->has_clients;
$this->params['cases'] = $model->getCases();
$this->params['galery'] = $model->galeryblock;
$this->params['feedback'] = $model->feedbackblock;

?>

<h1><?= $model->_Header ?></h1>



<div class="content">
    <?= $model->_Content ?>
</div>

