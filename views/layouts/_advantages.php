<?php

use yii\helpers\Html;

$this->registerCssFile('/css/advantages.css');

$type1 = [
    'Полный пакет<br/>закрывающих<br/>документов' => '/image/advantages/prem-bg-1.png',
    'Прозрачные,<br/>выгодные цены' => '/image/advantages/prem-bg-2.png',
    'Гарантии<br/>безопасности груза' => '/image/advantages/prem-bg-3.png',
    'Квалифицированные<br/>сотрудники' => '/image/advantages/prem-bg-4.png',
    'Собственный<br/>автопарк' => '/image/advantages/prem-bg-5.png',
    'Все виды оплаты' => '/image/advantages/prem-bg-6.png',
];

$type2 = [
    'Любая форма оплаты<br/>Работаем с НДС <br/>и без НДС' => '/image/advantages/_adv_1.png',
    'Свой штат <br/>проверенных <br/>специалистов' => '/image/advantages/_adv_2.png',
    'Только часовая оплата <br/>(без доплат за этажи)' => '/image/advantages/_adv_3.png',
    'Свое оборудование <br/>от шуруповерта до <br/>болгарки' => '/image/advantages/_adv_4.png',
    'Срочный вызов<br/>подача 30 мин.' => '/image/advantages/_adv_5.png',
    'Выезд за город <br/>на легковом авто.' => '/image/advantages/_adv_6.png',
];

$type3 = [
    'Личный кабинет' => '/image/advantages/__adv_1.png',
    'Возможность <br/>отслеживания груза' => '/image/advantages/__adv_2.png',
    'Персональный <br/>менеджер' => '/image/advantages/__adv_3.png',
    'Быстрый <br/>документооборот' => '/image/advantages/__adv_4.png',
    'Безналичный<br/>расчет и работа с НДС' => '/image/advantages/__adv_5.png',
    'Возможность <br/>отсрочки платежа' => '/image/advantages/__adv_6.png',
];


if ($type == 1)
    $arr = $type1;

if ($type == 2)
    $arr = $type2;

if ($type == 3)
    $arr = $type3;
?>

<div class="row">
    <?php foreach ($arr as $k => $item): ?>

        <div class="col-xs-12 col-sm-4">

            <div class="item-wrap" style="background: url(<?= $item ?>) top center no-repeat">                
                <div><?= $k ?></div>
            </div>
        </div>

    <?php endforeach; ?>

</div>




