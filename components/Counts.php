<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

/**
 * Description of YesNo
 *
 * @author smol
 */
class Counts extends \yii\base\BaseObject {

    public $autopark, $order, $client;

    const _AUTOPARK = 234;
    const _ORDERS = 234768;
    const _CLIENTS = 22478;
    const _DATE = 1557055909;

    public function init() {

        $time = time() - self::_DATE;

        $this->autopark = self::_AUTOPARK + intval(($time / (60 * 60 * 24 * 10 ))); // каждый 10 дней автопарк
        $this->order = self::_ORDERS + intval(($time / (60 * 60 ))); // каждый час заказ
        $this->client = self::_CLIENTS + intval(($time / (60 * 60 * 24 ))); // каждый день клиент

        parent::init();
    }

}
