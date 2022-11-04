<?php

namespace app\modules\autopark\controllers;

use Yii;
use yii\web\Controller;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends \app\controllers\PublicController {

    public function actionIndex() {

        return $this->render('index', [
        ]);
    }

}
