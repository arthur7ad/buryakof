<?php

namespace app\modules\review\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\review\models\Review;
use yii\data\ActiveDataProvider;
use app\modules\review\Assets;

class ReviewsSlider extends Widget {

    public function run() {

        Assets::register($this->view);

        $model = Review::find()->where(['is_enable' => 1])->limit(12)->all();

        return $this->render('reviews_slider', [
                    'model' => $model,
        ]);
    }

}
