

<div class="park-list">

    <p class="h2 header-line">Наш автопарк</p>

    <div class="row">
        <?php
        foreach ($model as $item)
            echo $this->render('_item', ['model' => $item]);
        ?>
        <?= app\modules\forms\widgets\Order::widget(); ?>

    </div>
</div>
