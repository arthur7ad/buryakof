<?php

namespace app\modules\feedback\controllers;

use app\modules\feedback\models\Feedback;
use app\modules\feedback\models\FeedbackItem;
use app\modules\feedback\models\FeedbackItemSearch;
use app\modules\feedback\models\FeedbackSearch;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * AdminController implements the CRUD actions for Clients model.
 */
class AdminController extends \app\controllers\AdminController {

    /**
     * Lists all Clients models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new FeedbackSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Clients models.
     * @return mixed
     */
    public function actionIndexElements($id) {
        $feedback = $this->findModel($id);
        $searchModel = new FeedbackItemSearch();
        $dataProvider = $searchModel->search(['id' => $id]);

        return $this->render('index_elements', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'feedback_id' => $id,
            'feedback'=>$feedback
        ]);
    }

    /**
     * Displays a single Clients model.
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
     * Creates a new Galery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Feedback();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['index']);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Creates a new Galery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateElement($id) {
        $model = new FeedbackItem();
        $model->feedback_id = $id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index-elements', 'id' => $id]);
        }

        return $this->render('create_element', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index']);
        }

        return $this->render('update', [
                    'model' => $model,
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
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeleteElement($id) {
        $model = $this->findChildModel($id);
        $model->delete();

        return $this->redirect(['index-elements', 'id' => $model->feedback_id]);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Feedback the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Feedback::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FeedbackItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findChildModel($id) {
        if (($model = FeedbackItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
