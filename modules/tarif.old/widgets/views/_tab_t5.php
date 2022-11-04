<?php ?>

<table class="table table-hover table-bordered">

    <tr>
        <th>Направление</th>
        <th>Цена отдельно</th>
        <th>Цена догрузом</th>
    </tr>

    <?php
    foreach ($model as $item):

        if (!$item->t5_otdelno && !$item->t5_dogruz)
            continue;
        ?>




        <tr>
            <td><?= $item->toCity->name ? $item->toCity->name : '' ?></td>
            <td><?= $item->t5_otdelno ? \Yii::$app->formatter->asCurrency($item->t5_otdelno) : '' ?></td>
            <td><?= $item->t5_dogruz ? \Yii::$app->formatter->asCurrency($item->t5_dogruz) : '' ?></td>
        </tr>

<?php endforeach; ?>

</table>