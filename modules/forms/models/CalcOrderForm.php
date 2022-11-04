<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CalcOrderForm extends EmailForm {

    public $name;
    public $phone;
    public $from;
    public $to;
    public $params;
//    public $personal_accept;
    public $email = '';
    public $subject = 'Запрос на расчёт';

//    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
//            [['name', 'phone', 'personal_accept'], 'required'],
            [['name', 'phone', 'from', 'to', 'params'], 'required'],
//            ['email', 'email'],
//            ['personal_accept', 'in', 'range' => [1]],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
            'phone' => 'Телефон',
            'from' => 'От куда',
            'to' => 'Куда',
            'params' => 'Параметры',
//            'personal_accept' => 'Я даю согласие на обратобку персональных данных',
        ];
    }

}
