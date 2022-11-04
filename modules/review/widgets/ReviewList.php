<?php

namespace app\modules\review\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\review\models\Review;

class ReviewList extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        $model = Review::find()
                ->orderBy(['date' => 'SORT_DESC'])
                ->where(['is_enable' => 1])
                ->all();
        if ($this->list)
            return $this->render('reviewlistpage', ['model' => $model]);
        else
            return $this->render('reviewlist', ['model' => $model]);
    }

}
