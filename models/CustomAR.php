<?php

namespace app\models;

use Yii;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\imagine\Image;
use DateTime;
use DateTimeZone;

class CustomAR extends \yii\db\ActiveRecord {

    const MASK = "/\{[a-z0-9-]+}/";
    const WIDGET = [
        '<p>{widget-reviews}</p>', // review
    ];

    public function beforeSave($insert) {

        /*
         * Дата создания
         */

        if ($this->hasAttribute('created_at')) {
//            var_dump($this);
            if ($this->isNewRecord) {
                $date = new DateTime('now', new DateTimeZone('+0500'));
                $this->created_at = $date->format('Y-m-d H:i:s');
            }
        }

        /*
         * Дата обновления
         */

        if ($this->hasAttribute('updated_at')) {
            $date = new DateTime('now', new DateTimeZone('+0500'));
            $this->updated_at = $date->format('Y-m-d H:i:s');
        }

        return parent::beforeSave($insert);
    }

    public function afterFind() {

//        echo Yii::$app->controller->module->module->layout;
//        var_dump(Yii::$app);
//        exit();
//        if (isset(Yii::$app->helper->is_public) && Yii::$app->helper->is_public) {
//
//
////            if ($this->hasAttribute('content')) {
////
////
////                $this->content = preg_replace('/<img src="([^"]+)" alt="([^"]+)"  style="([^"]+)"[^>]+>/i'
////                        , Html::a(Html::img('$1', ['alt' => '$2', 'style' => '$3']), '$1'
////                                , ['class' => 'popup-link']), $this->content);
////
//////                $this->content = '';
////            }
//
//            /*
//             * перебираем шорткоды
//             */
//
//            $attrS = ['header', 'content', 'title', 'description', 'keyword', 'default_title', 'default_description', 'default_keywords'];
//
//            foreach ($attrS as $attr)
//                if (($this->hasAttribute($attr)))
//                    $this->$attr = $this->replaceShortCodes($this->$attr);
//        }
//
////        echo $this->layout;
////        if($this->la)
//
//        return parent::afterFind();
    }

    public function replaceSeo() {

        $attrS = ['header', 'content', 'title', 'description', 'keyword', 'content_seo_1', 'content_seo_2', 'value'];

        foreach ($attrS as $attr)
            if (($this->hasAttribute($attr))){

                $this->$attr = $this->replaceShortCodes($this->$attr, $attr);
            }

        return true;
    }

    public function replaceWidget() {

        foreach (self::WIDGET as $item):

            if ($item == '<p>{widget-reviews}</p>')
                $this->content = str_replace($item, \app\modules\review\widgets\Reviews::widget(), $this->content);


        endforeach;





        return true;
    }

    // для списков
    public static function __getList() {

        return ArrayHelper::map(self::__getAll(), 'id', 'name');
    }

    // для списков
    public static function __getHeaders() {

        return ArrayHelper::map(self::__getAll(), 'id', 'header');
    }

    public static function __getAll() {

        return self::find()->all();
    }

    public function replaceShortCodes($text, $attr) {

        if (preg_match_all(self::MASK, $text, $short_vars)) {

            $short_vars = $short_vars[0];

            foreach ($short_vars as $var):

//                if ($var == '{price}') {
//
//                    if ($this->hasAttribute('price'))
//                        $text = str_replace($var, $this->price . ' руб.', $text);
//                }

                $name = str_replace(['{', '}'], '', $var);

                $value = \app\modules\region_templates\models\RegionTemplates::findOne([
                            'name' => $name,
                            'city_id' => \Yii::$app->city->id,
                            'url' => Yii::$app->request->url,
                ]);

//                Yii::error(Yii::$app->request->url);
//                Yii::error($value);

                if (!$value)
                    $value = \app\modules\region_templates\models\RegionTemplates::findOne([
                                'name' => $name,
                                'city_id' => \Yii::$app->city->id,
                    ]);

                if (Yii::$app->city->landing_name) {

                    $val = \app\modules\region_templates\models\RegionTemplates::findOne([
                                'name' => $name,
                                'city_id' => \Yii::$app->city->id,
                                'domain' => Yii::$app->city->landing_name,
                    ]);
                    
                    Yii::error($val);

                    $value = $val ? $val : $value;
                }



                if ($value) {

//                    Yii::error($name);
//                    Yii::error($value->value);

                    if ($attr == 'title' || $attr == 'description') {
                        if ($name == 'phone' && $value->value)
                            $value->value = Yii::$app->formatter->asPhone($value->value);

                        if ($name == 'phone2' && $value->value)
                            $value->value = Yii::$app->formatter->asPhone($value->value);
                    } else {

                        if ($name == 'phone' && $value->value)
                            $value->value = Html::a(Yii::$app->formatter->asPhone($value->value), 'tel:' . $this->phone($value->value));

                        if ($name == 'phone2' && $value->value)
                            $value->value = Html::a(Yii::$app->formatter->asPhone($value->value), 'tel:' . $this->phone($value->value));
                    }

                    $text = str_replace($var, trim($value->value), $text);
                }

            endforeach;

//            print_r($short_vars);
        }

//        exit();

        return $text;
    }

    public function phone($val) {

        if (is_string($val) && $val[0] == '9')
            $val = '+7' . $val;

        return $val;
    }

}
