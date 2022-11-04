<?php

namespace app\modules\calc\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\bootstrap\ActiveForm;
use yii\base\ViewNotFoundException;

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

    public function actionResult() {
        $model = new \app\modules\calc\models\CalcForm();

//        print_r(Yii::$app->request->get());

        if (Yii::$app->request->isAjax &&
                $model->load(Yii::$app->request->get()) &&
                $model->validate()) {

            $model->Calc();
//            Yii::error(Yii::$app->request->get());

            return $this->renderAjax('result', ['model' => $model]);
        }

        return 0;
    }

    public function actionValidateLocal() {

        $model = new \app\modules\calc\models\CalcLocalForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    public function actionResultLocal() {
        $model = new \app\modules\calc\models\CalcLocalForm();

//        print_r(Yii::$app->request->get());

        if (Yii::$app->request->isAjax &&
                $model->load(Yii::$app->request->get()) &&
                $model->validate()) {

            $model->Calc();
//            Yii::error(Yii::$app->request->get());

            return $this->renderAjax('result', ['model' => $model]);
        }

        return 0;
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

        if (isset($model->parent) && $model->parent->template)
            $this->layout = '@layouts/' . $model->parent->template;

        if ($model->template != 'default')
            $this->layout = '@layouts/' . $model->template;

        Yii::$app->view->title = $model->url->title;

        if ($model->url->description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->url->description]);

        if ($model->url->keywords)
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $model->url->keywords]);


        return $this->render('index', ['model' => $model]);
    }

}
