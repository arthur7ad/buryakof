<?php

namespace app\modules\search\controllers;

use Yii;
use yii\bootstrap\Html;
use yii\web\Controller;
use yii\helpers\ArrayHelper;

/**
 * Default controller for the `object` module
 */
class DefaultController extends \app\controllers\PublicController {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($query = false) {

        \Yii::$app->view->title = 'Поиск по сайту';

        if (!$query)
            return $this->render('index');

        $sPage = \app\modules\static_page\models\Page::find()
                ->where(['like', 'header', $query])
                ->orWhere(['like', 'content', $query])
                ->all();

        $result = ArrayHelper::map($sPage, 'header', 'url');

        $Page = \app\modules\page\models\Page::find()
                ->joinWith('pageContents')
                ->where(['like', 'page_content.header', $query])
                ->orWhere(['like', 'page_content.content', $query])
                ->all();

        foreach ($Page as $page)
            $result[$page->name] = $page->Url;


        \Yii::$app->view->title = 'Поиск: ' . $query;


        return $this->render('index', [
                    'result' => $result,
                    'query' => $query,
        ]);
    }

}
