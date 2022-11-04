<?php

namespace app\modules\cases\controllers;

use app\modules\cases\models\Cases;
use app\modules\cases\models\CasesSearch;
use app\modules\url\models\Url;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Clients model.
 */
class AdminController extends \app\controllers\AdminController {

    /**
     * Lists all Cases models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CasesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cases model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cases model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Cases();

        $url = new Url();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($url->load(Yii::$app->request->post()) && $url->save()) {
                $model->url_id = $url->id;

                if ($model->save())
                    return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
                    'model' => $model,
            'url' => $url,
        ]);
    }

    /**
     * Updates an existing Cases model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $url = $model->url;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if ($url->load(Yii::$app->request->post()) && $url->save())
                ;

            return $this->redirect(['index']);
        }

        return $this->render('update', [
                    'model' => $model,
            'url' => $url,
        ]);
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cases the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Cases::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
