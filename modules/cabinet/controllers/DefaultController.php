<?php

namespace app\modules\cabinet\controllers;

use Yii;
use yii\web\Controller;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

    public function actionIndex() {

        if (!Yii::$app->user->isGuest):

            if (Yii::$app->user->identity->role == 1)
                return $this->redirect('/page/admin/index');


            $user = \app\modules\user\models\User::findOne(Yii::$app->user->id);


            return $this->render('index', ['user' => $user]);

        endif;
    }

}
