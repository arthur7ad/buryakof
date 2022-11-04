<?php

namespace app\modules\slider\widgets;

use Yii;
use yii\base;
use yii\base\Widget;
use app\modules\slider\models\SliderItem;
use app\modules\slider\ModuleAssets;

class LandingSlider extends Widget {

    public $system_name;

    public function run() {

        ModuleAssets::register($this->view);

        $model = SliderItem::find()->where([
                    'is_enable' => 1,
                    'slide_page.page_id' => Yii::$app->city->landing_id
                ])
                ->joinWith('slidePage')
                ->orderBy('ord DESC')
                ->all();

        return $this->render('slider', ['model' => $model]);
    }

}
