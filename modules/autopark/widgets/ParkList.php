<?php

namespace app\modules\autopark\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\page\models\Page;

class ParkList extends Widget {

    public $type = 0;

    public function run() {

        \app\modules\autopark\ModuleAssets::register($this->view);
        
        \Yii::error($this->type);

        if ($this->type)
            $model = \app\modules\autopark\models\Autopark::find()
                    ->orderBy(['order' => SORT_DESC])
                    ->where(['is_enable' => 1,'type' => $this->type])
                    ->all();
        else
            $model = \app\modules\autopark\models\Autopark::find()
                    ->orderBy(['order' => SORT_DESC])
                    ->where(['is_enable' => 1])
                    ->all();

        return $this->render('park_list', ['model' => $model]);
    }

}
