<?php

namespace app\modules\url\models;

use Yii;
use app\modules\page\models\Page;
use yii\helpers\ArrayHelper;

class Url extends \app\models\Url {

    public static function getId($url) {
        return ($model = self::findOne(['url' => $url])) ? $model->id : false;
    }

    public static function getUrlPageList() {

        $result = [];

        $model = self::find()->all();

        foreach ($model as $item)
            if (isset($item->page->header))
                $result[$item->id] = $item->page->header . ' ——  ' . $item->url . ' ';

        return $result;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage() {
        return $this->hasOne(Page::className(), ['url_id' => 'id']);
    }

    public static function __getForList() {

        return ArrayHelper::map(self::find()->all(), 'url', 'url');
    }

}
