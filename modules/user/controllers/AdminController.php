<?php

namespace app\modules\user\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\user\models\User;
use app\modules\user\models\UserSearch;

/**
 * AdminController implements the CRUD actions for News model.
 */
class AdminController extends \app\controllers\AdminController {

    public function actionCreate() {

        $model = new \app\modules\user\models\NewUserForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionIndex() {
        $searchModel = new UserSearch();

        $params = Yii::$app->request->queryParams;

        $dataProvider = $searchModel->search($params);
        
        Yii::error($dataProvider->getTotalCount());

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->setPassword($model->password);
            $model->save();

            Yii::$app->session->setFlash('success', 'Пароль изменён');
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
