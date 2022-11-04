<?php

use yii\bootstrap\Html;
?>

<script>
    address = '<?= \app\modules\region_templates\models\RegionTemplates::getVal('adres') ?>';
</script>

<div class="about slide">

    <div class="container">

        <h1><?= $model->_Header ?></h1>
        <div class="row">
            <div class="col-xs-12">
                <?= $model->_Content ?>

            </div>
        </div>
    </div>
</div>

