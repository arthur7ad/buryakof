<?php

namespace app\modules\calc\models;

use Yii;
use yii\base\Model;

//
/**
 * ContactForm is the model behind the contact form.
 */
class CalcForm extends \app\modules\forms\models\EmailForm {

    public $from;
    public $to;
    public $poputno;
    public $name;
    public $phone;
    public $rast;
    public $summ;
    public $car;
    public $subject = 'Расчитать стоимость';

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['name', 'phone'], 'required'],
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
        ];
    }

}
