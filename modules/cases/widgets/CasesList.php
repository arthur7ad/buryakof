<?php

namespace app\modules\cases\widgets;

use yii\base\Widget;
use yii\data\ActiveDataProvider;
use app\modules\cases\models\Cases;
use app\modules\cases\Assets;
use Yii;

class CasesList extends Widget {

    public function run() {

        Assets::register($this->view);

        $dataProvider = new ActiveDataProvider([
            'query' => Cases::find()->where('cities LIKE "'.Yii::$app->city->id.'" OR  cities LIKE "'.Yii::$app->city->id.',%" OR cities LIKE "%,'.Yii::$app->city->id . '" OR cities LIKE "%,'.Yii::$app->city->id.',%"'),
        ]);

        $dataProvider->pagination->pageSize = 24;

        return $this->render('cases', [
                    'dataProvider' => $dataProvider,
        ]);
    }

}
