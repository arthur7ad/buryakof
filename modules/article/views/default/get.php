<?php
$this->title = $model->url->title;
$this->params['breadcrumbs'][] = ['label' => 'Наши статьи', 'url' => '/article'];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $model->header ?></h1>
<div class="content article">
    <?= $model->content ?>
</div>