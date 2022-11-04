<?php

use yii\helpers\ArrayHelper;

$s_o = array_sum(ArrayHelper::getColumn($tab, 'pr_o'));
$s_d = array_sum(ArrayHelper::getColumn($tab, 'pr_d'));
?>

<table class="table table-hover table-bordered">

    <tr>
        <th>Направление</th>
        <?php if ($s_o): ?>
            <th>Цена отдельно</th>
        <?php endif; ?>
        <?php if ($s_d): ?>
            <th>Цена догрузом</th>
        <?php endif; ?>


    </tr>

    <?php
    foreach ($tab as $row):
        ?>


        <tr>
            <td><?= $row['city'] ?></td>
            <?php if ($s_o): ?>
                <td><?= $row['pr_o'] ? \Yii::$app->formatter->asCurrency($row['pr_o']) : '' ?></td>
            <?php endif; ?>

            <?php if ($s_d): ?>
                <td><?= $row['pr_d'] ? \Yii::$app->formatter->asCurrency($row['pr_d']) : '' ?></td>
            <?php endif; ?>
        </tr>

    <?php endforeach; ?>

</table>