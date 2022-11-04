<?php

namespace app\modules\calc\models;

use Yii;
use yii\base\Model;

//
/**
 * ContactForm is the model behind the contact form.
 */
class CalcForm extends Model {

    public $from;
    public $to;
    public $type_tc;
    public $_type_tc;
    public $type_load;
    public $_type_load;
    public $tonnazh;
    public $_tonnazh;
    public $prim;
    public $_prim;
    public $rast;
    public $summ;
    public $subject = 'Расчитать стоимость';

    public function init() {

        $this->_type_tc = ['1' => 'Тент', '1.2' => 'Изотерма', '1.5' => 'Рефрежиратор'];
        $this->_type_load = ['0' => 'Задняя', '200' => 'Верхняя', '300' => 'Боковая'];
        $this->_tonnazh = ['18' => 1.5, '24' => 3, '30' => 5, '32' => 10, '40' => 20];
        $this->_prim = ['1' => 'Отдельно', '.5' => 'Догруз', '1.2' => 'Кругорейс'];


        parent::init();
    }

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
//            [['from', 'to'], 'required'],
            [['rast'], 'required'],
            [['type_tc', 'type_load', 'tonnazh', 'prim', 'summ', 'rast'], 'safe']
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'rast' => 'Расстояние (км)',
            'from' => 'Город отправления',
            'to' => 'Город прибытия',
            'type_tc' => 'Тип ТС',
            'type_load' => 'Тип загрузки',
            'tonnazh' => 'Тоннаж',
            'prim' => 'Примечание',
        ];
    }

    public function Calc() {

        $this->summ = 0;

        $this->summ = (int) $this->rast * (float) $this->type_tc;
        $this->summ = $this->summ * (float) $this->tonnazh;
        $this->summ = $this->summ * (float) $this->prim;
        $this->summ = $this->summ + (float) $this->type_load;
    }

}
