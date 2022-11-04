<?php

namespace app\modules\page\controllers;

use Yii;
use app\modules\page\models\{
    Page,
    PageSearch,
    SubDomainSearch
};
use app\modules\url\models\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Page model.
 */
class AdminController extends \app\controllers\AdminController {

    /**
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSubdomain() {
        $searchModel = new SubDomainSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('subdomain_index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Page model.
     * @param integer $id
     * @param integer $url_id
     * @param integer $page_en_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSubdomainCreate() {

        $model = new Page();
        $url = new Url();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $url->url = '#';

            if ($url->load(Yii::$app->request->post()) && $url->save()) {
                $model->url_id = $url->id;


                if ($model->save())
                    return $this->redirect(['subdomain']);
            }
        }
        return $this->render('subdomain_create', [
                    'model' => $model,
                    'url' => $url,
        ]);
    }

    public function actionCreate() {

        $model = new Page();
        $model->template = 'default';
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

    public function actionCreateUrl($header, $parent_id) {

        $page = Page::findOne($parent_id);

        if ($page && $header)
            return $page->url->url . '/' . \app\components\Translite::str2url($header);

        if ($header)
            return '/' . \app\components\Translite::str2url($header);

        return false;
    }

    /**
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $url_id
     * @param integer $page_en_id
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

    public function actionUpdateSubdomain($id) {

        $model = $this->findModel($id);

        $url = $model->url;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if ($url->load(Yii::$app->request->post()) && $url->save())
                ;

            return $this->redirect(['subdomain']);
        }

        return $this->render('subdomain_update', [
                    'model' => $model,
                    'url' => $url,
        ]);
    }

    public function actionUpdateCityContent($id, $city_id) {

        $post = Yii::$app->request->post();

        if (isset($post['PageCityContent'])) {

            if (is_array($post['PageCityContent']['content'])) {

                foreach ($post['PageCityContent']['content'] as $k => $item):

                    \app\modules\page\models\PageCityContent::Add([
                        'city_id' => $k,
                        'page_id' => $id,
                        'title' => $post['PageCityContent']['title'][$k],
                        'description' => $post['PageCityContent']['description'][$k],
                        'header' => $post['PageCityContent']['header'][$k],
                        'content' => $post['PageCityContent']['content'][$k],
                        'content_seo_1' => $post['PageCityContent']['content_seo_1'][$k],
                        'content_seo_2' => $post['PageCityContent']['content_seo_2'][$k],
                        'cases' => $post['PageCityContent']['cases'],
                    ]);

                endforeach;
            }
        }

        $model = $this->findModel($id);

        $model->collectCityContent();
        
        Yii::error($city_id);

        return $this->render('update_city_content', [
                    'model' => $model,
                    'city_id' => $city_id,
        ]);
    }

    /**
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $url_id
     * @param integer $page_en_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteSubdomain($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['subdomain']);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $url_id
     * @param integer $page_en_id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Page::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function beforeAction($action) {

        \app\modules\page\Assets::register($this->view);

        return parent::beforeAction($action);
    }

}
