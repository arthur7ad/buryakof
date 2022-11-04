<?php

namespace app\modules\link_block\controllers;

use Yii;
use app\modules\link_block\models\LinkBlock;
use app\modules\link_block\models\LinkBlockItem;
use app\modules\link_block\models\LinkBlockSearch;
use app\modules\link_block\models\LinkBlockItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for LinkBlock model.
 */
class AdminController extends \app\controllers\AdminController {

    /**
     * Lists all LinkBlock models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new LinkBlockSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexItem($id) {
        $searchModel = new LinkBlockItemSearch();
        $data = Yii::$app->request->queryParams;
        $data['LinkBlockItemSearch']['link_block_id'] = $id;
        $dataProvider = $searchModel->search($data);

        return $this->render('index_item', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'id' => $id,
        ]);
    }

    /**
     * Creates a new LinkBlock model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new LinkBlock();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionCreateItem($id) {

        $model = new LinkBlockItem();
        $linkblock = $this->findModel($id);
        $model->link_block_id = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index-item', 'id' => $id]);
        }

        return $this->render('create_item', [
                    'model' => $model,
                    'linkblock' => $linkblock,
        ]);
    }

    /**
     * Updates an existing LinkBlock model.
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
        $model = LinkBlockItem::findOne($id);
        $linkblock = $model->linkBlock;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index-item', 'id' => $linkblock->id]);
        }

        return $this->render('update_item', [
                    'model' => $model,
                    'linkblock' => $linkblock,
        ]);
    }

    /**
     * Deletes an existing LinkBlock model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteItem($id) {

        $model = LinkBlockItem::findOne($id);

        if ($model) {

            $block_id = $model->link_block_id;

            $model->delete();

            return $this->redirect(['index-item', 'id' => $block_id]);
        } else
            return $this->goBack();
    }

    /**
     * Finds the LinkBlock model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LinkBlock the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = LinkBlock::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
