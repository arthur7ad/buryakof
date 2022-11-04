<?php
$this->title = $model->url->title;
$this->params['breadcrumbs'][] = ['label' => 'Наши кейсы', 'url' => '/cases'];
$this->params['breadcrumbs'][] = $this->title;
$this->params['galery'] = $model->galeryblock;
?>

<h1><?= $model->name ?></h1>

<div class="content article">
    <?= $model->description ?>
</div>
<?php if ($this->params['galery']) { ?>
    <div class="container">
        <?= app\modules\galery\widgets\GalleryList::widget(['gallery' => $this->params['galery']->id]); ?>
    </div>
<?php } ?>