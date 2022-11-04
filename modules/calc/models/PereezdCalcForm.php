<?php

namespace app\modules\calc\models;

use Yii;
use yii\base\Model;

//
/**
 * ContactForm is the model behind the contact form.
 */
class PereezdCalcForm extends CalcForm {

    const COUNT = [
        0 => 'Без',
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

    public $from;
    public $to;
    public $poputno;
    public $name;
    public $phone;
    public $rast;
    public $summ;
    public $count;
    public $subject = 'Расчитать стоимость';

    public function init() {


        parent::init();
    }

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['name', 'phone'], 'required'],
            [['from', 'to', 'poputno', 'summ', 'car', 'count'], 'safe'],
            ['phone', 'match', 'pattern' => '/\+[0-9] \([0-9]{3}\) [0-9]{3}-[0-9]{4}$/', 'message' => ' Неверно введён телефон'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'rast' => 'Расстояние (км)',
            'from' => 'Откуда',
            'to' => 'Куда',
            'name' => 'Ваше имя',
            'phone' => 'Ваш телефон',
            'poputno' => 'Попутно',
            'count' => 'Количество грузчиков',
        ];
    }

}
