<?php

namespace app\modules\article\widgets;

use yii\base;
use yii\base\Widget;
use yii\data\ActiveDataProvider;
use app\modules\article\models\Article;
use app\modules\article\Assets;
use Yii;

class ArticleList extends Widget {

    public function run() {

        Assets::register($this->view);

        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()->where('city LIKE "'.Yii::$app->city->id.'" OR  city LIKE "'.Yii::$app->city->id.',%" OR city LIKE "%,'.Yii::$app->city->id . '" OR city LIKE "%,'.Yii::$app->city->id.',%"'),
        ]);

        $dataProvider->pagination->pageSize = 15;

        return $this->render('articles', [
                    'dataProvider' => $dataProvider,
        ]);
    }

}
