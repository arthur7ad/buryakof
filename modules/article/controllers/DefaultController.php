<?php

namespace app\modules\article\controllers;

use Yii;
use yii\web\Controller;
use app\modules\article\models\Article;
use yii\web\HttpException;
use yii\base\ViewNotFoundException;
use app\modules\article\Assets;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

    public function actionGet($url_id) {


        $model = Article::find()
                        ->with('url')
                        ->where([
                            'url_id' => $url_id
                        ])->andWhere('city LIKE "'.Yii::$app->city->id.'" OR  city LIKE "'.Yii::$app->city->id.',%" OR city LIKE "%,'.Yii::$app->city->id . '" OR city LIKE "%,'.Yii::$app->city->id.',%"')
                        ->one();


        if (!$model)
            throw new HttpException(404, 'Page not Found');


        Assets::register($this->view);

        $model->replaceSeo();


        $this->layout = '@layouts/default';

        Yii::$app->view->title = $model->url->title;

        if ($model->url->description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->url->description]);

        if ($model->url->keywords)
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $model->url->keywords]);


        return $this->render('get', [
                    'model' => $model,
        ]);
    }

}
