<?php

use yii\helpers\Html;
use kv4nt\owlcarousel\OwlCarouselWidget;
?>


<div class="reviews-page">
    <div class="container">

        <?php foreach ($model as $item): ?>

            <?php echo $this->render('_item_long', ['model' => $item]); ?>

        <?php endforeach;
        ?>

    </div>

    <hr/>

    <?php echo $this->render(Yii::getAlias('_form_guest'), ['model' => new app\modules\review\models\Review]); ?>

</div>