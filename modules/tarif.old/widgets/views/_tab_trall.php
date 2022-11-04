<?php ?>

<table class="table table-hover table-bordered">

    <tr>
        <th>Направление</th>
        <th>Цена отдельно</th>
        <th>Цена догрузом</th>
    </tr>

    <?php
    foreach ($model as $item):

        if (!$item->trall_otdelno && !$item->trall_dogruz)
            continue;
        ?>




        <tr>
            <td><?= $item->toCity->name ? $item->toCity->name : '' ?></td>
            <td><?= $item->trall_otdelno ? \Yii::$app->formatter->asCurrency($item->trall_otdelno) : '' ?></td>
            <td><?= $item->trall_dogruz ? \Yii::$app->formatter->asCurrency($item->trall_dogruz) : '' ?></td>
        </tr>

    <?php endforeach; ?>

</table>