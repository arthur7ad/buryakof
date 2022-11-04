<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Partner extends EmailForm {

    public $name;
    public $phone;
    public $comment = '';
    public $subject = 'Заявка на партнёрство';

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['name', 'phone', 'comment'], 'required'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
            'phone' => 'Ваш телефон',
            'comment' => 'Краткое описание транспортного средства ',
//            'personal_accept' => 'Я даю согласие на обратобку персональных данных',
        ];
    }

}
