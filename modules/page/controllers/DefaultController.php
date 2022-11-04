<?php

namespace app\modules\page\controllers;

use app\modules\article\models\Article;
use app\modules\cases\models\Cases;
use Yii;
use yii\web\Controller;
use app\modules\page\models\Page;
use yii\web\HttpException;
use yii\base\ViewNotFoundException;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

/**
     * @inheritdoc
     */
    public function behaviors() {
        return [
        
            'HttpCache' => [
            	'class' => 'yii\filters\HttpCache',
            	'lastModified' => function ($action, $params) {
            		
               		return 1636551060;
            	},
        	],
        ];
    }

    public function actionIndex() {

        return $this->render('index', [
        ]);
    }

    public function actionGet($url_id) {


        $model = Page::find()
                        ->with('url')
                        ->where([
                            'url_id' => $url_id
                        ])->one();


        if (!$model)
            throw new HttpException(404, 'Page not Found');

        $model->replaceSeo();
        $model->replaceWidget();
        $model->url->replaceSeo();

        if (isset($model->parent) && $model->parent->template)
            $this->layout = '@layouts/' . $model->parent->template;

        if ($model->template != 'default')
            $this->layout = '@layouts/' . $model->template;

//        Yii::$app->view->title = $model->_title;

        if ($model->_description) {
            if(Yii::$app->request->get('dp-1-page')) {
                \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->_description . ' стр.' . Yii::$app->request->get('dp-1-page')]);
            }else{
                \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->_description]);
            }
        }


        if ($model->_Content_seo_1)
            $this->view->content_seo_1 = $model->_Content_seo_1;

        if ($model->_Content_seo_2)
            $this->view->content_seo_2 = $model->_Content_seo_2;

        $this->view->page_id = $model->id;

        if (Yii::$app->request->get('dp-1-page'))
        {
            $model->url->title .= ' стр.' . Yii::$app->request->get('dp-1-page');
        }

        if($model->template == 'article')
        {
            $count = Article::find()->where('city LIKE "'.Yii::$app->city->id.'" OR  city LIKE "'.Yii::$app->city->id.',%" OR city LIKE "%,'.Yii::$app->city->id . '" OR city LIKE "%,'.Yii::$app->city->id.',%"')
                ->count();

            if(!$count)
            {
                throw new HttpException(404, 'Page not Found');
            }
        }

        if($model->template == 'cases')
        {
            $count = Cases::find()->where('cities LIKE "'.Yii::$app->city->id.'" OR  cities LIKE "'.Yii::$app->city->id.',%" OR cities LIKE "%,'.Yii::$app->city->id . '" OR cities LIKE "%,'.Yii::$app->city->id.',%"')
                ->count();

            if(!$count)
            {
                throw new HttpException(404, 'Page not Found');
            }
        }

        try {
            return $this->render('get_' . $model->template, [
                        'model' => $model,
            ]);
        } catch (ViewNotFoundException $e) {
            return $this->render('get', [
                        'model' => $model,
            ]);
        }
    }

}
