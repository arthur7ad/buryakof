<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="<?= ($type == 'gruz') ? 'active gruz' : 'gruz' ?>" >
        <a href="?calc=gruz" >Грузоперевозки</a></li>
    <li role="presentation" class="<?= ($type == 'perev') ? 'active pereezd' : 'pereezd' ?>">
        <a href="?calc=pereezd">Переезды</a></li>
    <li role="presentation" class="<?= ($type == 'gruzchik') ? 'active gruzchik' : 'gruzchik' ?>">
        <a href="?calc=gruzchik">Грузчики</a></li>
</ul>
