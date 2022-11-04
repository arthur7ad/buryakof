<?php

namespace app\modules\faq\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use app\modules\page\models\Page;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends \app\controllers\PublicController {

    public function actionIndex() {

        $page = Page::findOne(['url_id' => 'faq']);

//        if (!$page)
//            throw new HttpException(404, 'Page not Found');

        $reviews = \app\modules\faq\models\Faq::find()
                ->where(['is_enable' => 1])
                ->orderBy(['order' => SORT_DESC, 'question' => SORT_ASC])
                ->all();

//        \Yii::$app->view->title = $page->title;
//        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $page->description]);
//        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);


        return $this->render('index', [
//                    'page' => $page,
                    'reviews' => $reviews,
        ]);
    }

}
