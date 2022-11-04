<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CallBackForm extends EmailForm {

    public $name;
    public $phone;
//    public $personal_accept;
    public $email = '';
    public $subject = 'Запрос на звонок';

//    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
//            [['name', 'phone', 'personal_accept'], 'required'],
            [['name', 'phone'], 'required'],
            ['phone', 'match', 'pattern' => '/\+[0-9] \([0-9]{3}\) [0-9]{3}-[0-9]{4}$/', 'message' => ' Неверно введён телефон'],
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
//            'personal_accept' => 'Я даю согласие на обратобку персональных данных',
        ];
    }

}
