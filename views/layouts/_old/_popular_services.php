<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;

$this->registerCssFile('/css/popular_services.css');
?>

<div class="row">

    <?php foreach ($data as $item): ?>

        <div class="col-xs-12 col-sm-4 col-md-2 item-wrap">
            <div class="item">
                <a href='<?= $item['url'] ?>'> 
                    <div class="image" style="background: url('<?= $item['image'] ?>') 
                         center center no-repeat" >
                    </div>
                    <div class='text'><?= $item['text'] ?></div>
                </a>
            </div>
        </div>

    <?php endforeach;
    ?>
</div>