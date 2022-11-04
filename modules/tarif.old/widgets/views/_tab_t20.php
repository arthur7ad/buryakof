<?php ?>

<table class="table table-hover table-bordered">

    <tr>
        <th>Направление</th>
        <th>Цена отдельно</th>
        <th>Цена догрузом</th>
    </tr>

    <?php
    foreach ($model as $item):

        if (!$item->t20_otdelno && !$item->t20_dogruz)
            continue;
        ?>




        <tr>
            <td><?= $item->toCity->name ? $item->toCity->name : '' ?></td>
            <td><?= $item->t20_otdelno ? \Yii::$app->formatter->asCurrency($item->t20_otdelno) : '' ?></td>
            <td><?= $item->t20_dogruz ? \Yii::$app->formatter->asCurrency($item->t20_dogruz) : '' ?></td>
        </tr>

<?php endforeach; ?>

</table>