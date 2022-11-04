<?php

namespace app\modules\calc\controllers;

use Yii;
use yii\httpclient\Client;
use yii\web\Controller;
use yii\web\Response;
use yii\bootstrap\ActiveForm;
use yii\base\ViewNotFoundException;
use app\modules\calc\models\GruzCalcForm;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends \app\controllers\PublicController {

    public function actionValidate() {

        $model = new \app\modules\calc\models\CalcForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    public function actionTest() {


        return $this->render('test');
    }

    public function actionIndex() {

        $model = \app\modules\page\models\Page::findOne(67);

        if (!$model)
            throw new HttpException(404, 'Page not Found');

        $model->replaceSeo();
        $model->replaceWidget();
        $model->url->replaceSeo();
        if (isset($model->parent) && $model->parent->template)
            $this->layout = '@layouts/' . $model->parent->template;

        if ($model->template != 'default')
            $this->layout = '@layouts/' . $model->template;

//        Yii::$app->view->title = $model->url->title;
//
        if ($model->url->description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->_description]);
//
//        if ($model->url->keywords)
//            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $model->url->keywords]);


        return $this->render('index', ['model' => $model]);
    }

    public function actionGruzCalcValidate() {

        $model = new GruzCalcForm;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    public function actionGruzCalculate() {

        $model = new GruzCalcForm;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
//            Yii::$app->response->format = Response::FORMAT_JSON;
            return $model->price;
        }

//        return 1;
    }

    public function actionGruzCalc() {

        $model = new \app\modules\calc\models\GruzCalcForm;

        if (Yii::$app->request->isAjax &&
                $model->load(Yii::$app->request->post()) &&
                $model->validate()) {

            $model->body = $model->name . ' заказал грузоперевозку' . PHP_EOL
                    . 'Телефон: ' . $model->phone . PHP_EOL . ''
                    . 'Машина: ' . $model->car . PHP_EOL . ''
                    . 'От куда: ' . $model->from . PHP_EOL . ''
                    . 'Куда: ' . $model->to . PHP_EOL . ''
                    . 'Попутно: ' . ($model->poputno ? 'Да ' : 'Нет') . PHP_EOL . ''
                    . 'Цена: ' . $model->summ;
            $model->contact();
            $this->sendToSrm($model->name, $model->phone, 'заказал грузоперевозку на'.$model->car.' откуда:'.$model->from.' куда:'.$model->to.' грузчики:'.$model->count.' цена:'.$model->summ);
            return 1;
        }

        return 0;
    }

    public function actionPerCalc() {

        $model = new \app\modules\calc\models\PereezdCalcForm;

        if (Yii::$app->request->isAjax &&
                $model->load(Yii::$app->request->post()) &&
                $model->validate()) {

            $model->body = $model->name . ' заказал переезд' . PHP_EOL
                    . 'Телефон: ' . $model->phone . PHP_EOL . ''
                    . 'Машина: ' . $model->car . PHP_EOL . ''
                    . 'От куда: ' . $model->from . PHP_EOL . ''
                    . 'Куда: ' . $model->to . PHP_EOL . ''
                    . 'Грузчиков: ' . $model->count . PHP_EOL . ''
                    . 'Цена: ' . $model->summ;
            $model->contact();
            $this->sendToSrm($model->name, $model->phone, 'заказал переезд на '.$model->car.' откуда:'.$model->from.' куда:'.$model->to.' грузчики:'.$model->count.' цена:'.$model->summ);
            return 1;
        }

        return 0;
    }

    public function actionPereezdCalcValidate() {

        $model = new \app\modules\calc\models\PereezdCalcForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    public function actionGruzchikCalcValidate() {

        $model = new \app\modules\calc\models\GruzchikCalcForm;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    public function actionGruzchikCalculate() {

        $model = new \app\modules\calc\models\GruzchikCalcForm;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
//            Yii::$app->response->format = Response::FORMAT_JSON;
            return $model->price;
        }

//        return 1;
    }

    public function actionGruzchikCalc() {

        $model = new \app\modules\calc\models\GruzchikCalcForm;

        if (Yii::$app->request->isAjax &&
                $model->load(Yii::$app->request->post()) &&
                $model->validate()) {

//            $model->body = $model->name . ' заказал звонок на телефон ' . $model->phone;
//            $model->contact();

            return 1;
        }

        return 0;
    }

    public function sendToSrm($name, $phone, $comment, $city = false) {

        $data = [
            'name' => $name,
            'phone' => str_replace(['(', ')', '+', '-', ' '], '', $phone),
            'comment' => $comment,
            'city' => Yii::$app->city->currentName,
        ];

        if ($city)
            $data['city'] = $city;

        $client = new Client();

        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('http://85.113.143.165/order/default/order-from-site')
            ->setData($data)
            ->send();
    }

}
