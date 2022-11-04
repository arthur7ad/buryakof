<?php

namespace app\modules\sitemap\controllers;

use app\modules\city\models\City;
use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use app\modules\content\models\Content;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends \app\controllers\PublicController {

    public function actionPage() {

//        $urls = \app\modules\url\models\Url::find()->all();

        $result = [];

        foreach (\app\modules\page\models\Page::findAll(['is_enable' => 1]) as $model):

            $model->replaceSeo();
            $result[$model->url->url] = $model->header;

        endforeach;

//        foreach (\app\modules\article\models\Article::find()->all() as $model):
//
//            $model->replaceSeo();
//            $result[$model->url->url] = $model->header;
//
//        endforeach;


        return $this->render('page', ['result' => $result]);
    }

    public function actionIndex() {

        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'text/xml');

        $urls = [];

        $host = Yii::$app->request->hostInfo;

        $hostString = explode('https://', $host);
        $cityString = explode('.', $hostString[1])[0];
        $cityId = City::getCityIdByCode($cityString);
        $articleFlag = 0;

        foreach (\app\modules\url\models\Url::find()->all() as $url)
            if($url->page) {
                if($url->url != '#' && $url->url != '/article' && $url->url != '/cases')
                $urls[] = $host . $url->url;
            }


        foreach (\app\modules\article\models\Article::find()->all() as $url) {
            if(in_array($cityId,$url->city))
            {
                $articleFlag = 1;
                $urls[] = $host . $url->url->url.$cityId;
            }
        }
        if($articleFlag){
            $urls[] = $host . '/article';
        }

        foreach (\app\modules\cases\models\Cases::find()->all() as $url) {

            if(in_array($cityId,$url->cities))
            {
                $casesFlag = 1;
                $urls[] = $host . $url->url->url;
            }
        }
        if($casesFlag){
            $urls[] = $host . '/cases';
        }

        /*
          $result = '<?xml version="1.0" encoding="utf-8"?>' . PHP_EOL;
         *
         */
        $result = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($urls as $url) {
            $result .= "<url>
                <loc> $url </loc>
                <changefreq>daily</changefreq>
                <priority>0.5</priority>
            </url>" . PHP_EOL;
        }
        $result .= '</urlset>';

        return $result;
//        return true;
//        return $this->renderPartial('index', [
//                    'result' => $result
//        ]);
    }

}
