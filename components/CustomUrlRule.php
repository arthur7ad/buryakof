<?php

namespace app\components;

use Yii;
use yii\web\UrlRuleInterface;
use yii\base\BaseObject;
use app\modules\page\models\Page;
use app\modules\article\models\Article;
use app\modules\city\models\City;
use yii\web\HttpException;
use app\modules\cases\models\Cases;

class CustomUrlRule extends BaseObject implements UrlRuleInterface {

    public function createUrl($manager, $route, $params) {

        return false;
    }

    public function parseRequest($manager, $request) {

        $pathInfo = '/' . $request->getPathInfo();

        Yii::error($pathInfo);

//        $pathInfo = $request->getPathInfo();


        $id = ($model = \app\modules\url\models\Url::findOne(['url' => $pathInfo])) ? $model->id : false;

        if ($id) {

            if (\app\models\Page::findOne(['url_id' => $id]))
                return ['page/default/get', ['url_id' => $id]];
            
            if (\app\models\Article::findOne(['url_id' => $id]))
                return ['article/default/get', ['url_id' => $id]];

            if (\app\models\Cases::findOne(['url_id' => $id]))
                return ['cases/default/get', ['url_id' => $id]];
        }



        return false;
    }

}
