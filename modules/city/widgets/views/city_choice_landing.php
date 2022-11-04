<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
?>


<?php
//Yii::error(1);
//Yii::error(Yii::$app->city->page_link);

Modal::begin([
    'id' => 'city-modal',
    'header' => 'Выбор города',
]);

//Yii::error($arr);
?>

<div class="city-modal-list">
    <div class="row">



        <?php foreach ($arr as $k => $part): ?>

            <div class="col-xs-4 col-sm-3">
                <div class="h4"><?= $k ?></div>
                <ul class="list-unstyled">
                    <?php foreach ($part as $letter => $city): ?>


                        <li>
                            <?php
                            if (\Yii::$app->city->current_city != $city->name_eng) {

                                $link = $city->link;

//                                Yii::error($item->link);
//                            $link = ($item->is_default) ? '/' . Yii::$app->city->page_link : '/' . Yii::$app->city->page_link;
                                echo Html::a($city->name, Url::to(['', 'city' => $city->name_eng]));
                            } else {
                                echo Html::tag('p', $city->name, ['class' => 'acitve-city']);
                            }
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


