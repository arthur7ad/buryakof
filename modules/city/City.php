<?php

namespace app\modules\city;

use Yii;

class City extends \yii\base\BaseObject {

    public $current_city = '';
    public $default_city = '';
    public $current_link = '';
    public $page_link = '';
    public $home_url = '';
    public $title = 'Ваш Город';
    public $autofind = false;
    public $landing_name = '';
    public $landing_id = false;

    public function init() {

        $host = $_SERVER['HTTP_HOST'];
        $this->current_city = ((count($arr = explode('.', $_SERVER['HTTP_HOST'])) == 3 && $arr[0] != 'www')) ? $arr[0] : $this->default_city;

        if (( $landing = \app\modules\page\models\Page::findOne([
                    'subdomain' => $this->current_city
                ]))) {

            $this->landing_id = $landing->id;
            $this->landing_name = $this->current_city;
            $this->current_city = $this->default_city;



//            if (($region = Yii::$app->ipgeobase->getLocation(Yii::$app->request->userIP)) && isset($region['city'])) {
//
////                Yii::error($region['city']);
////                Yii::error($this->current_city);
////                Yii::error(models\City::findOne(['name' => $region['city']])->name_eng);
//
//                if (($city = models\City::findOne(['name' => $region['city']])) && ($city->name_eng != $this->current_city))
//                    $this->current_city = $city->name_eng;
//            }

            if (isset(Yii::$app->request->get()['city']) && Yii::$app->request->get()['city'])
                $this->current_city = Yii::$app->request->get()['city'];

//            if (Yii::$app->request->get()['city'] === '')
//                $this->current_city = $this->default_city;
        }
    }

//    public function get() {
//
//        $this->init();
//
//        return $this->current_city;
//    }

    public function getId() {

        $id = \app\modules\city\models\City::getCityIdByName($this->current_city);

        return $id ? $id : 0;
    }

    public function getCurrentName() {

        return models\City::findOne(['name_eng' => \Yii::$app->city->current_city])->name;
    }

    public function getModel() {

        return models\City::findOne(['name_eng' => \Yii::$app->city->current_city]);
    }

}
