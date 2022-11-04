<?php

namespace app\modules\autopark\models;

use Yii;
use yii\base\Model;
use app\modules\forms\models\EmailForm;

/**
 * ContactForm is the model behind the contact form.
 */
class Order extends EmailForm {

    public $name;
    public $phone;
    public $comment = '';
    public $car_name = '';
    public $accept = false;
    public $subject = 'Заявка на машину';

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['name', 'phone', 'comment', 'accept'], 'required'],
            ['accept', 'accept'],
            ['car_name', 'safe']
        ];
    }

    public function Accept($attribute, $params) {
        
        Yii::error($this->accept);

        if (!$this->accept) {
            $this->addError($attribute, 'Вы должные согласиться с условиями, прежде чем продолжить');
        }
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
            'phone' => 'Ваш телефон',
            'comment' => 'Комментарий',
            'accept' => 'Я соглашаюсь с политикой конфиденциальности',
//            'personal_accept' => 'Я даю согласие на обратобку персональных данных',
        ];
    }

}
