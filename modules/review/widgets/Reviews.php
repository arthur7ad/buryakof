<?php

namespace app\modules\review\widgets;

use app\modules\feedback\models\FeedbackItem;
use yii\base\Widget;
use yii\data\ActiveDataProvider;
use app\modules\review\Assets;

class Reviews extends Widget {

    public function run() {

        Assets::register($this->view);

        $dataProvider = new ActiveDataProvider([
            'query' => FeedbackItem::find(),
        ]);

        $dataProvider->pagination->pageSize = 9;

        return $this->render('reviews', [
                    'dataProvider' => $dataProvider,
        ]);
    }

}
