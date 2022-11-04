<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Vacancy extends EmailForm {

    public $name;
    public $phone;
    public $vacancy = '';
    public $subject = 'Заявка на вакансию';

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['name', 'phone', 'vacancy'], 'required'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
            'phone' => 'Ваш телефон',
            'vacancy' => 'Желаемая вакансия',
//            'personal_accept' => 'Я даю согласие на обратобку персональных данных',
        ];
    }

}
