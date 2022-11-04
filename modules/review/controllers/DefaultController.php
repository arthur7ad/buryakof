<?php

namespace app\modules\review\controllers;

use Yii;
use app\modules\review\models\Review;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;

/**
 * AdminController implements the CRUD actions for Review model.
 */
class DefaultController extends \app\controllers\PublicController {

    public function actions() {
        return [
            'upload-image' => [
                'class' => FileAPIUpload::className(),
                'path' => '@webroot/image/review'
            ],
            'thanks' => [
                'class' => 'yii\web\ViewAction',
                'viewPrefix' => '',
                'defaultView' => 'thanks',
            ],
        ];
    }

    public function actionAdd() {

        $model = new Review();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['thanks']);
        } else {

            Yii::$app->session->setFlash('error', 'Произошла ошибка');

            return $this->redirect('/reviews');
        }
    }

}
