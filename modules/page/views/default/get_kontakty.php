<?php
$this->title = $model->_title;
$this->params['breadcrumbs'] = $model->breadCrumbs;
?>

<h1><?= $model->_Header ?></h1>

<script>
    address = '<?= \app\modules\region_templates\models\RegionTemplates::getVal('adres') ?>';
</script>

<div class="content kontakty">

    <div class="row">
        <div class="col-xs-12 col-sm-8">
            <?= $model->_Content ?>
        </div>
        <div class="col-xs-12 col-sm-4">
            <?= \app\modules\forms\widgets\Contact::widget(); ?>
        </div>
    </div>
</div>