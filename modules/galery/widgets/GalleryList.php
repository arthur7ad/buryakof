<?php

namespace app\modules\galery\widgets;

use app\modules\galery\models\GaleryItem;
use yii\base\Widget;
use yii\data\ActiveDataProvider;
use app\modules\cases\Assets;

class GalleryList extends Widget {

    public $gallery;

    public function run() {

        Assets::register($this->view);

        $dataProvider = new ActiveDataProvider([
            'query' => GaleryItem::find()->where(['galery_id' => $this->gallery]),
        ]);

        $dataProvider->pagination->pageSize = 15;

        return $this->render('galery', [
                    'dataProvider' => $dataProvider,
        ]);
    }

}
