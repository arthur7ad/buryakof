<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Order extends EmailForm {

    public $name;
    public $phone;
    public $type;
    public $time = '';
    public $comment;
    public $title;
    public $subject = 'Заказ услуги';

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['name', 'phone'], 'required'],
            [['comment', 'title'], 'safe'],
            ['phone', 'match', 'pattern' => '/\+[0-9] \([0-9]{3}\) [0-9]{3}-[0-9]{4}$/', 'message' => ' Неверно введён телефон'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
            'phone' => 'Ваш телефон',
            'time' => 'Удобное время для звонка',
            'comment' => 'Комментарий',
        ];
    }

}
