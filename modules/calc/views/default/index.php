<?php
//$this->registerJsFile('https://maps.api.2gis.ru/2.0/loader.js?pkg=full');
$this->title = $model->_title;
?>
<h1 class="h1 header-line" style="margin-top: 2rem"><?= $model->header ?></h1>
<div class="content">
    <?= $model->_Content ?>
</div>

<?= app\modules\calc\widgets\Calc::widget() ?>

