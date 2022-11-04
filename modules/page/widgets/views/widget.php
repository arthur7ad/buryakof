<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;

echo Html::a($current_city, '#', [
    'data-toggle' => "modal",
    'data-target' => "#city-modal",
]);

Modal::begin([
    'id' => 'city-modal',
    'header' => 'Выбор города',
]);
?>

<div class="city-modal-list">
    <div class="row">

        <?php foreach ($model as $part): ?>

            <div class="col-xs-4">
                <ul class="list-unstyled">
                    <?php foreach ($part as $item): ?>
                        <li>
                            <?=
                            Html::a($item->name, ['/', 'city' => $item->name_eng], ['data' => [
                                    'method' => 'post'
                        ]])
                            ?>
                        </li>

                    <?php endforeach; ?>
                </ul>
            </div>

        <?php endforeach; ?>

    </div>
</div>

<?php
Modal::end();
?>


