<?php ?>

<table class="table table-hover table-bordered">

    <tr>
        <th>Направление</th>
        <th>Цена отдельно</th>
        <th>Цена догрузом</th>
    </tr>

    <?php
    foreach ($model as $item):

        if (!$item->t2_otdelno && !$item->t2_dogruz)
            continue;
        ?>




        <tr>
            <td><?= $item->toCity->name ? $item->toCity->name : '' ?></td>
            <td><?= $item->t2_otdelno ? \Yii::$app->formatter->asCurrency($item->t2_otdelno) : '' ?></td>
            <td><?= $item->t2_dogruz ? \Yii::$app->formatter->asCurrency($item->t2_dogruz) : '' ?></td>
        </tr>

    <?php endforeach; ?>

</table>