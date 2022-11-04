<?php

namespace app\modules\link_block\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\link_block\Assets;
use app\modules\link_block\models\LinkBlock;

class LinkBlockWidget extends Widget {

    public $sysname;
    public $count = 6;

    public function run() {

        Assets::register($this->view);

        $model = LinkBlock::findOne(['sys_name' => $this->sysname]);

        switch ($this->count):

            case 4:

                return $this->render('link_block_4', [
                            'model' => $model,
                ]);

                break;

            default :

                return $this->render('link_block', [
                            'model' => $model,
                ]);

                break;

        endswitch;
    }

}
