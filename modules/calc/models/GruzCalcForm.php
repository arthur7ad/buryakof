<?php

namespace app\modules\calc\models;

use Yii;
use yii\base\Model;

//
/**
 * ContactForm is the model behind the contact form.
 */
class GruzCalcForm extends CalcForm {

    public $from;
    public $to;
    public $poputno;
    public $name;
    public $phone;
    public $rast;
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
            [['from', 'to', 'poputno', 'summ', 'car'], 'safe'],
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
            'car' => 'Машина',
            'to' => 'Куда',
            'name' => 'Ваше имя',
            'phone' => 'Ваш телефон',
            'poputno' => 'Попутно',
        ];
    }

}
