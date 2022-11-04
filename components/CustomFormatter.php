<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

/**
 * Description of YesNo
 *
 * @author smol
 */
class CustomFormatter extends \yii\i18n\Formatter {

    public function asYes($value) {

        return $value ? 'Да' : 'Нет';
    }

    public function asYesIco($value) {

        return $value ? '▣' : '▢';
    }

    public function asPhone($value) {

        // телефон 	9300110811
        if (strlen($value) == 10 && $value[0] == '9' && $value[1] == '3' && $value[2] == '0' && $value[3] == '0')
            return preg_replace("/^(\d{3})(\d{3})(\d{2})(\d{2})$/", "+7 ($1) $2-$3-$4", $value);

        if (strlen($value) == 10)
            return preg_replace("/^(\d{3})(\d{2})(\d{2})(\d{3})$/", "+7 ($1) $2-$3-$4", $value);

        if (strlen($value) == 11 && $value[0] == '8' && $value[1] == '8' && $value[2] == '0' && $value[3] == '0')
            return preg_replace("/^(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})$/", "$1-$2-$3-$4-$5", $value);

        if (strlen($value) == 11)
            return preg_replace("/^(\d{1})(\d{3})(\d{1})(\d{3})(\d{3})$/", "$1 ($2) $3-$4-$5", $value);
    }

}
