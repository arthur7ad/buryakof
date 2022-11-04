<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Core;
use app\models\Category;
use app\modules\options\models\Options;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;
use yii\web\HttpException;

class SiteController extends \app\controllers\PublicController {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            'HttpCache' => [
            	'class' => 'yii\filters\HttpCache',
            	'lastModified' => function ($action, $params) {
               		return 1636551060;
            	},
        	],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadFileAction',
                'url' => '/image/upload/', // Directory URL address, where files are stored.
                'path' => '@webroot/image/upload/' // Or absolute path to directory where files are stored.
            ],
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetImagesAction',
                'url' => '/image/upload/', // URL адрес папки где хранятся изображения.
                'path' => '@webroot/image/upload/', // Или абсолютный путь к папке с изображениями.
//                'type' => \vova07\imperavi\actions\GetAction::TYPE_IMAGES,
            ],
            'file-img-upload' => [
                'class' => FileAPIUpload::className(),
                'path' => '@webroot/image/upload/'
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($city = false) {

//        Yii::error(Yii::$app->ipgeobase->getLocation(Yii::$app->request->userIP));
//
//        if ($city) {
//            Yii::$app->session->set('city', $city);
//        } else {
//
//            if (!Yii::$app->session->get('city')) {
//
//                $gIp = Yii::$app->ipgeobase->getLocation(Yii::$app->request->userIP);
////                $gIp = Yii::$app->ipgeobase->getLocation('176.59.204.162'); //ёбург
//
//                if ($gIp && isset($gIp['city']) && ($city = \app\modules\city\models\City::findOne(['name' => $gIp['city']]))) {
//                    $this->redirect(['/' . $city->name_eng, 'autofind' => 1]);
//                } else {
//                    Yii::$app->session->set('city', Yii::$app->city->default_city);
//                    Yii::$app->city->setNotAf();
//                }
//            } else {
//                Yii::$app->city->current_city = Yii::$app->city->default_city;
//                Yii::$app->session->set('city', Yii::$app->city->default_city);
//            }
//        }
//
//        if (isset(Yii::$app->request->get()['autofind']))
//            Yii::$app->city->setAf();


        $domain = explode('.', Yii::$app->request->hostName);

        if (count($domain) > 2)
            if ($model = \app\modules\page\models\Page::findOne([
                        'subdomain' => $domain[0]
                    ]))
                return $this->landing($model);


        $model = \app\modules\page\models\Page::getHome();

        if (!$model)
            throw new HttpException(404, 'Page not Found');


        $model->replaceSeo();
        $model->url->replaceSeo();


        if ($model->_Content_seo_1)
            $this->view->content_seo_1 = $model->_Content_seo_1;

        if ($model->_Content_seo_1)
            $this->view->content_seo_2 = $model->_Content_seo_2;

        $this->layout = '@layouts/' . $model->template;

        Yii::$app->view->title = $model->_title;

        $this->view->page_id = $model->id;

        if ($model->_description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->_description]);



//        $model->replaceSeo();
//        $model->page->replaceSeo();
//        \Yii::$app->view->title = $model->title ? $model->title : $model->page->default_title;
//
//        if ($model->description)
//            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->description]);
//        else
//            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->page->default_description]);
//
//        if ($model->keywords)
//            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $model->keywords]);

        return $this->render('index', ['model' => $model]);
    }

    private function landing($model) {


        $model->replaceSeo();
        $model->url->replaceSeo();

        $this->layout = '@layouts/landing/' . $model->subdomain;

        Yii::$app->view->title = $model->_title;

        $this->view->page_id = $model->id;

        if ($model->_description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->_description]);


        return $this->render('lending', ['model' => $model]);
    }

}
