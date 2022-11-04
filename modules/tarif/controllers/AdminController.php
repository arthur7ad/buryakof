<?php

namespace app\modules\tarif\controllers;

use Yii;
use app\modules\tarif\models\Tarif;
use app\modules\tarif\models\TarifItem;
use app\modules\tarif\models\TarifSearch;
use app\modules\tarif\models\TarifItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;

/**
 * AdminController implements the CRUD actions for Tarif model.
 */
class AdminController extends \app\controllers\AdminController {

    public function actions() {

        return [
            'image-upload' => [
                'class' => FileAPIUpload::className(),
                'path' => '@webroot/image/tarif'
            ],
        ];
    }

    public function actionIndex() {
        $searchModel = new TarifSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexItem($id) {
        $searchModel = new TarifItemSearch();
        $data = Yii::$app->request->queryParams;
        $data['TarifItemSearch']['tarif_id'] = $id;
        $dataProvider = $searchModel->search($data);

        return $this->render('index_item', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'id' => $id,
        ]);
    }

    /**
     * Displays a single Tarif model.
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
     * Creates a new Tarif model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Tarif();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionCreateItem($id) {

        $model = new TarifItem();
        $tarif = $this->findModel($id);
        $model->tarif_id = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index-item', 'id' => $id]);
        }

        return $this->render('create_item', [
                    'model' => $model,
                    'tarif' => $tarif,
        ]);
    }

    /**
     * Updates an existing Tarif model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function actionUpdateItem($id) {
        $model = TarifItem::findOne($id);
        $tarif = $model->tarif;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index-item', 'id' => $tarif->id]);
        }

        return $this->render('update_item', [
                    'model' => $model,
                    'tarif' => $tarif,
        ]);
    }

    public function actionDeleteItem($id) {


        $model = TarifItem::findOne($id);
        $tarif = $model->tarif;
        $model->delete();

        return $this->redirect(['index-item', 'id' => $tarif->id]);
    }

    /**
     * Deletes an existing Tarif model.
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
     * Finds the Tarif model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tarif the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Tarif::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
