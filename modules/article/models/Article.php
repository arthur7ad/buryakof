<?php

namespace app\modules\article\models;

use Yii;
use app\modules\url\models\Url;

class Article extends \app\models\Article {

    public function beforeSave($insert) {

        if ($this->isNewRecord) {
            $url = new \app\modules\url\models\Url;
            $url->title = $this->header;
            $url->url = \app\components\Translite::str2url($url->title);
            if ($url->save())
                $this->url_id = $url->id;
        }

        $this->city = implode(',', $this->city);
        return parent::beforeSave($insert);
    }

    public function afterFind()
    {
        $this->city = explode(',', $this->city);
        parent::afterFind();
    }

    public function getUrl() {
        return $this->hasOne(Url::className(), ['id' => 'url_id']);
    }

    public function getAnons() {


        $string = mb_substr($this->content, 0, 100, 'UTF-8'); // обрезаем и работаем со всеми кодировками и указываем исходную кодировку
        $position = mb_strrpos($string, ' ', 'UTF-8'); // определение позиции последнего пробела. Именно по нему и разделяем слова
        $string = mb_substr($string, 0, $position, 'UTF-8'); // Обрезаем переменную по позиции
        return $string . ' ...';
    }

}
