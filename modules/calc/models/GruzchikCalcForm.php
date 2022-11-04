<?php

namespace app\modules\calc\models;

use Yii;
use yii\base\Model;

//
/**
 * ContactForm is the model behind the contact form.
 */
class GruzchikCalcForm extends CalcForm {

    const PRICE = 300;
    const TIME = [
        2 => '2 часa',
        3 => '3 часa',
        4 => '4 часa',
        5 => '5 часов',
        6 => '6 часов',
        7 => '7 часов',
        8 => '8 часов',
    ];
    const COUNT = [
        1 => '1 человек',
        2 => '2 человека',
        3 => '3 человека',
        4 => '4 человека',
        5 => '5 человек',
        6 => '6 человек',
        7 => '7 человек',
        8 => '8 человек',
        9 => '9 человек',
        10 => '10 человек',
    ];

    public $time;
    public $count;
    public $is_instrument;
    public $is_remni;
    public $is_rohlia;
    public $subject = 'Расчитать стоимость';

    public function init() {

        parent::init();

        $this->count = 1;
        $this->time = 2;
//        $this->is_instrument = 1;
//        $this->is_remni = 1;
//        $this->is_rohlia = 1;
    }

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['name', 'phone'], 'required'],
            [['time', 'count', 'is_instrument', 'is_remni', 'is_rohlia', 'summ'], 'safe'],
            ['phone', 'match', 'pattern' => '/\+[0-9] \([0-9]{3}\) [0-9]{3}-[0-9]{4}$/', 'message' => ' Неверно введён телефон'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'time' => 'Укажите время',
            'count' => 'Количество грузчиков',
            'is_instrument' => 'Нужны инструменты',
            'is_remni' => 'Нужны ремни',
            'is_rohlia' => 'Нужна рохля',
            'name' => 'Ваше имя',
            'phone' => 'Ваш телефон',
        ];
    }

    public function getPrice() {

        $price = 0;

        $price = $this->count * self::PRICE * $this->time;

        if ($this->is_instrument)
            $price = $price * 1.3;

        if ($this->is_remni)
            $price = $price * 1.5;

        if ($this->is_rohlia)
            $price += 1500;

        return (int) $price;
    }

}
