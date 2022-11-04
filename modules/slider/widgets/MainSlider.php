<?php

namespace app\modules\slider\widgets;

use Yii;
use yii\base;
use yii\base\Widget;
use app\modules\slider\models\SliderItem;
use app\modules\slider\ModuleAssets;

class MainSlider extends Widget {

    public $system_name;

    public function run() {

        ModuleAssets::register($this->view);

        $model = SliderItem::find()->where([
                    'is_enable' => 1
                ])
                ->orderBy('ord DESC')
                ->all();

//        Yii::error(Yii::$app->view->page_id);

        $slides = [];

        foreach ($model as $k => $item):

            if ($item->pages) {

//                Yii::error($item->pages);

                if (array_search(Yii::$app->view->page_id, $item->pages) !== false)
                    $slides[] = $item;
//                unset($model->sliderItems[$k]);
            } else
                $slides[] = $item;

        endforeach;


        return $this->render('slider', ['model' => $slides]);
    }

}
