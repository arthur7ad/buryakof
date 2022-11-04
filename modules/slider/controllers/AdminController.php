<?php

namespace app\modules\slider\controllers;

use app\models\SliderItemCity;
use Yii;
use app\modules\slider\models\Slider;
use app\modules\slider\models\SliderItem;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;

class AdminController extends \app\controllers\AdminController {

    public function actions() {

        return [
            'slide-upload' => [
                'class' => FileAPIUpload::className(),
                'path' => '@webroot/image/slider'
            ],
        ];
    }

    /**
     * Lists all Slider models.
     * @return mixed
     */
    public function actionIndex() {

        $searchModel = new \app\modules\slider\models\SliderItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Slider cities models.
     * @return mixed
     */
    public function actionCities($id) {

        $searchModel = new \app\modules\slider\models\SliderItemCitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index_city', [
            'id'          => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new SliderItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatecity($id) {
        $model = new SliderItemCity();
        $model->slider_item_id = $id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin/cities', 'id' => $model->slider_item_id]);
        } else {
            return $this->render('create_city', [
                'id'   => $id,
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Slider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = SliderItem::findOne($id);

//        $file = new \app\modules\slider\models\UploadFile;

        if ($model->load(Yii::$app->request->post())) {

//            if ($url = $model->upload())
//                $model->image = $url;

            return $model->save() ? $this->redirect(['index', 'id' => $model->slider_id]) : '';
        }
        return $this->render('update', [
                    'model' => $model,
//                    'file' => $file,
        ]);
    }

    /**
     * Updates an existing Slider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatecity($id) {
        $model = SliderItemCity::findOne($id);

        if ($model->load(Yii::$app->request->post())) {

            return $model->save() ? $this->redirect(['admin/cities', 'id' => $model->slider_item_id]) : '';
        }
        return $this->render('update_city', [
            'model' => $model,
                   'id' => $model->slider_item_id,
        ]);
    }

    /**
     * Deletes an existing Slider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteI($id) {
        $model = SliderItem::findOne($id);

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Slider::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
