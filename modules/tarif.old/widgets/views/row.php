<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
if (
        $model->t2_otdelno ||
        $model->t2_dogruz ||
        $model->t5_otdelno ||
        $model->t5_dogruz ||
        $model->t10_otdelno ||
        $model->t10_dogruz ||
        $model->t20_otdelno ||
        $model->t20_dogruz ||
        $model->trall_otdelno ||
        $model->trall_dogruz
):
    ?>



    <tr>
        <td><?= $model->toCity->name ? $model->toCity->name : '' ?></td>
        <td><?= $model->t2_otdelno ? $model->t2_otdelno : '' ?></td>
        <td><?= $model->t2_dogruz ? $model->t2_dogruz : '' ?></td>
        <td><?= $model->t5_otdelno ? $model->t5_otdelno : '' ?></td>
        <td><?= $model->t5_dogruz ? $model->t5_dogruz : '' ?></td>
        <td><?= $model->t10_otdelno ? $model->t10_otdelno : '' ?></td>
        <td><?= $model->t10_dogruz ? $model->t10_dogruz : '' ?></td>
        <td><?= $model->t20_otdelno ? $model->t20_otdelno : '' ?></td>
        <td><?= $model->t20_dogruz ? $model->t20_dogruz : '' ?></td>
        <td><?= $model->trall_otdelno ? $model->trall_otdelno : '' ?></td>
        <td><?= $model->trall_dogruz ? $model->trall_dogruz : '' ?></td>
    </tr>

<?php endif; ?>