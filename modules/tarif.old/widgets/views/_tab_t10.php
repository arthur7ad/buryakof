<?php ?>

<table class="table table-hover table-bordered">

    <tr>
        <th>Направление</th>
        <th>Цена отдельно</th>
        <th>Цена догрузом</th>
    </tr>

    <?php
    foreach ($model as $item):

        if (!$item->t10_otdelno && !$item->t10_dogruz)
            continue;
        ?>




        <tr>
            <td><?= $item->toCity->name ? $item->toCity->name : '' ?></td>
            <td><?= $item->t10_otdelno ? \Yii::$app->formatter->asCurrency($item->t10_otdelno) : '' ?></td>
            <td><?= $item->t10_dogruz ? \Yii::$app->formatter->asCurrency($item->t10_dogruz) : '' ?></td>
        </tr>

<?php endforeach; ?>

</table>