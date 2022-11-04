<?php

namespace app\modules\tarif\controllers;

use Yii;
use app\modules\tarif\models\Tarif;
use app\modules\tarif\models\TarifSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AdminController implements the CRUD actions for Tarif model.
 */
class AdminController extends \app\controllers\AdminController {

    /**
     * Lists all Tarif models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TarifSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
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
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
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
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
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

    public function actionImport() {

        $model = new \app\modules\tarif\models\ImportCSV();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {

                $file = Yii::getAlias('@webroot')
                        . '/import/' . $model->file->baseName . '.' . $model->file->extension;
                $model->file->saveAs($file);

                $row = 1;

                $data = \moonland\phpexcel\Excel::widget([
                            'mode' => 'import',
                            'fileName' => $file,
                            'setFirstRecordAsKeys' => false, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
                            'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
//                            'getOnlySheet' => 'sheet1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
                ]);

                $newData = [];


                //prepare data
                foreach ($data as $n => $page):

                    $city_id = \app\modules\city\models\City::getCityIdByRuName($n);


                    if ($city_id) {

//                        print_r($page);


                        foreach ($page as $k => $item):

                            if (isset($item['A'])) {

                                if ($to_id = \app\modules\city\models\City::getCityIdByRuName($item['A'])) {

                                    if ($model = Tarif::findOne(['from_id' => $city_id, 'to_id' => $to_id]))
                                        ;
                                    else
                                        $model = new Tarif;


                                    $model->from_id = (int) $city_id;
                                    $model->to_id = (int) $to_id;
                                    $model->t2_otdelno = (int) $item['B'];
                                    $model->t2_dogruz = (int) $item['C'];
                                    $model->t5_otdelno = (int) $item['D'];
                                    $model->t5_dogruz = (int) $item['E'];
                                    $model->t10_otdelno = (int) $item['F'];
                                    $model->t10_dogruz = (int) $item['G'];
                                    $model->t20_otdelno = (int) $item['H'];
                                    $model->t20_dogruz = (int) $item['I'];
                                    $model->trall_otdelno = (int) $item['J'];
                                    $model->trall_dogruz = (int) $item['K'];

                                    if ($model->save())
                                        ;
                                    else
                                        print_r($model->errors);
                                }
                            }

//                            print_r($k);
//                            echo '<br/>';
//                            print_r($item);
//                            echo '<br/>';

                        endforeach;

//                        print_r($item);
                    }

//                    echo $n;
//                    print_r($item);
//                    if ($item['ID'] && $model = Redirect::findOne((int) $item['ID'])) {
//                        $model->new_url = $item['Новый урл'];
//                        $model->old_url = $item['Старый урл'];
//                        $model->is_enable = $item['Включён'];
//                        $model->save();
//                    } else {
//                        $model = new \app\models\Redirect();
//                        $model->new_url = $item['Новый урл'];
//                        $model->old_url = $item['Старый урл'];
//                        $model->is_enable = $item['Включён'];
//                        $model->save();
//                    }
                endforeach;

//                exit();

                \Yii::$app->session->setFlash('success', "Импорт завершён!");

                return $this->redirect(['index']);
            }
        }

        return $this->render('import', ['model' => $model]);
    }

//    public function collectErrors($array) {
//
//        $result = '';
//
//        foreach ($array as $k => $attr)
//
//    }
}
