<?php

namespace app\modules\forms\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use kartik\form\ActiveForm;
use app\modules\forms\models\CallBackForm;
use yii\web\UploadedFile;
use yii\httpclient\Client;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends \app\controllers\PublicController {

    public function actionIndex() {

        return $this->render('index', [
        ]);
    }

    public function actionOrderV() {

        $model = new \app\modules\forms\models\Order;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    public function actionOrder() {

        $model = new \app\modules\forms\models\Order;

        if (Yii::$app->request->isAjax &&
                $model->load(Yii::$app->request->post()) &&
                $model->validate()) {

            $model->body = $model->name . ' ( ' . $model->phone . ' ) заказал услугу: ' .
                    PHP_EOL . $model->title . PHP_EOL . 'Комментарий: ' . $model->comment;

            $model->contact();

            $this->sendToSrm($model->name, $model->phone, $model->body);

            return 1;
        }

        return 0;
    }

    public function actionBlanketOrder() {

        $model = new \app\modules\forms\models\BlanketOrder();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

//            Yii::error($model);

            $model->body = $model->name . ' ( ' . $model->phone . ' ) ' .
                    PHP_EOL . 'Комментарий: ' . $model->comment;


            $model->fileDoc = UploadedFile::getInstance($model, 'fileDoc');
            if ($model->fileDoc)
                $model->upload();

            $model->contact();

            $this->sendToSrm($model->name, $model->phone, $model->body);

            \Yii::$app->getSession()->setFlash('success', 'Сообщение успешно отправлено');
        } else {

            print_r($model->errors);
            exit();

            \Yii::$app->getSession()->setFlash('error', 'Возникла ошибка при отправке сообщения');
        }


        return $this->redirect('/');
    }

    public function actionCallBackV() {

        $model = new \app\modules\forms\models\CallBackForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    public function actionCallBack() {

        $model = new \app\modules\forms\models\CallBackForm;

        if (Yii::$app->request->isAjax &&
                $model->load(Yii::$app->request->post()) &&
                $model->validate()) {

            $model->body = $model->name . ' заказал звонок на телефон ' . $model->phone;
            $model->contact();

            $this->sendToSrm($model->name, $model->phone, $model->body);

            return 1;
        }

        return 0;
    }

    public function actionContactForm() {

        $model = new \app\modules\forms\models\ContactForm();

        if (Yii::$app->request->isAjax &&
                $model->load(Yii::$app->request->post()) &&
                $model->validate()) {

            $model->body = $model->name . PHP_EOL;
            $model->body .= 'e-mail: ' . $model->email . PHP_EOL;
            $model->body .= 'Сообщение: ' . $model->message;

            $model->contact();

            return 1;
        }

        return 0;
    }

    public function actionBlanketOrderV() {

        $model = new \app\modules\forms\models\BlanketOrder();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
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

//    public function actionVacancyV() {
//
//        $model = new \app\modules\forms\models\Vacancy();
//
//        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
//            Yii::$app->response->format = Response::FORMAT_JSON;
//            return ActiveForm::validate($model);
//        }
//    }
//
//    public function actionVacancy() {
//
//        $model = new \app\modules\forms\models\Vacancy;
//
//        if (Yii::$app->request->isAjax &&
//                $model->load(Yii::$app->request->get()) &&
//                $model->validate()) {
//
//            $model->body = $model->name . '(' . $model->phone . ') претендует на вакансию ' . PHP_EOL . $model->vacancy;
//            $model->contact();
//
//            return 1;
//        }
//
//        return 0;
//    }
//
//    public function actionPartnerV() {
//
//        $model = new \app\modules\forms\models\Partner();
//
//        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
//            Yii::$app->response->format = Response::FORMAT_JSON;
//            return ActiveForm::validate($model);
//        }
//    }
//
//    public function actionPartner() {
//
//        $model = new \app\modules\forms\models\Partner;
//
//        if (Yii::$app->request->isAjax &&
//                $model->load(Yii::$app->request->get()) &&
//                $model->validate()) {
//
//            $model->body = $model->name . '(' . $model->phone . ') Хочет стать партнёром с ТС: ' . PHP_EOL . $model->comment;
//            $model->contact();
//
//            return 1;
//        }
//
//        return 0;
//    }

    public function actionCalcForm() {

        $model = new \app\modules\forms\models\CalcOrderForm();

        if (Yii::$app->request->isAjax &&
                $model->load(Yii::$app->request->get()) &&
                $model->validate()) {

            $model->body = $model->name . '(' . $model->phone . ') Хочет расчёт стоимости: ' . PHP_EOL;
            $model->body .= $model->from . ' — ' . $model->to . PHP_EOL;

//            $params = parse_url($model->params);
            parse_str($model->params, $params);

            $calclocal = new \app\modules\calc\models\CalcLocalForm();
            $calc = new \app\modules\calc\models\CalcForm();

            if ($calc->load($params) && $model->validate()) {

                if ($calc->type_tc)
                    $model->body .= $calc->_type_tc[$calc->type_tc] . PHP_EOL;

                if (isset($calc->type_load))
                    $model->body .= $calc->_type_load[$calc->type_load] . PHP_EOL;

                if ($calc->tonnazh)
                    $model->body .= $calc->_tonnazh[$calc->tonnazh] . PHP_EOL;

                if ($calc->prim)
                    $model->body .= $calc->_prim[$calc->prim] . PHP_EOL;
            }

            if ($calclocal->load($params) && $model->validate()) {

                if ($calclocal->type_tc)
                    $model->body .= $calclocal->_type_tc[$calclocal->type_tc] . PHP_EOL;

                if ($calclocal->type_load)
                    $model->body .= $calclocal->_type_load[$calclocal->type_load] . PHP_EOL;

                if ($calclocal->tonnazh)
                    $model->body .= $calclocal->_tonnazh[$calclocal->tonnazh] . PHP_EOL;

                if ($calclocal->prim)
                    $model->body .= $calclocal->_prim[$calclocal->prim] . PHP_EOL;
            }
//            print_r($model->params);



            $model->contact();

            return 1;
        }

        return 0;
    }

//
//    public function actionGoodQuestion() {
//
//        if (Yii::$app->request->isAjax) {
//
//            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//
//            $model = new GoodQuestionForm();
//
//            if ($model->load(Yii::$app->request->post())) {
//
//                $model->body = $model->name . ' (' . $model->phone . ')' . ' спрашивает: ' . $model->question;
//
//                if ($model->contact())
//                    return 1;
//                else
//                    return 0;
//            }
//        }
//    }
//
//    public function actionOneClick() {
//
//        if (Yii::$app->request->isAjax) {
//
//            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//
//            $model = new OneClickOrder();
//
//            if ($model->load(Yii::$app->request->post())) {
//
//                $model->body = $model->name . ' (' . $model->phone . ')' . ' заказал: ' . $model->good . ' (' . $model->count . ' шт) ';
//
//                if ($model->contact())
//                    return 1;
//                else
//                    return 0;
//            }
//        }
//    }
//
//    public function actionSendReview() {
//
//        if (Yii::$app->request->isAjax) {
//
//            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//
//            $model = new SendReviewForm();
//
//            if ($model->load(Yii::$app->request->post())) {
//
//                $model->body = $model->name . ' (' . $model->email . ')' . ' оставил отзыв: ' . $model->review;
//
//                if ($model->contact())
//                    return 1;
//                else
//                    return 0;
//            }
//        }
//    }
//
//    public function actionRassrochka() {
//
//        $model = new \app\modules\forms\models\RassrochkaForm();
//
//        if ($model->load(Yii::$app->request->post())) {
//
//
//            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//
//                if ($model->contact()) {
//
//                    Yii::$app->session->setFlash('success', 'Заявка отправлена.');
//                }
//            } else {
//                Yii::$app->session->setFlash('error', 'Ошибка отправки.');
//            }
//
//
//            return $this->redirect(Yii::$app->request->referrer);
//        }
//    }
}
