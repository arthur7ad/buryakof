<?php

namespace app\modules\region_templates\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "region_templates".
 *
 * @property integer $id
 * @property integer $city_id
 * @property string $name
 * @property string $value
 */
class RegionTemplates extends \app\models\RegionTemplates {

    const LABEL = 'in_header';

    public static function getInHeader() {

        $value = \app\modules\region_templates\models\RegionTemplates::findOne([
                    'name' => self::LABEL,
                    'city_id' => \Yii::$app->city->getId(),
        ]);

        return (isset($value->value) && $value->value) ? $value->value : false;
    }

    public static function getVal($name) {

        $value = \app\modules\region_templates\models\RegionTemplates::findOne([
                    'name' => $name,
                    'city_id' => \Yii::$app->city->getId(),
        ]);

        return (isset($value->value) && $value->value) ? $value->value : self::getDefaultCityVal($name);
    }

    public static function getDefaultCityVal($name) {

        $defaultCity = \app\modules\city\models\City::findOne(['is_default' => 1]);
        if ($defaultCity)
            $id = $defaultCity->id;

        if ($id) {
            $value = \app\modules\region_templates\models\RegionTemplates::findOne([
                        'name' => $name,
                        'city_id' => $id,
            ]);

            if ($value)
                return $value->value;
        }

        return false;
    }

    public static function __getNames() {

        return ArrayHelper::map(self::__getAll(), 'name', 'name');
    }

    public static function __getUrls() {

        return ArrayHelper::map(self::find()->all(), 'url', 'url');
    }

    public static function __getAds() {

        return ArrayHelper::map(self::find()->all(), 'ad', 'ad');
    }

}
