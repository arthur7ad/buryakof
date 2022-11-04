<?php

namespace app\modules\robots\controllers;

use Yii;
use yii\web\Controller;
use app\modules\robots\models\Robots;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends \app\controllers\PublicController {

    public function actionIndex($city = false) {

        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'text/plain');

        $domain = explode('.', Yii::$app->request->hostName);

        if (count($domain) > 2)
            if ($model = \app\modules\page\models\Page::findOne([
                        'subdomain' => $domain[0]
                    ])) {
                return 'User-Agent: *' . PHP_EOL . 'Disallow: /' . PHP_EOL . 'Host: https://' . Yii::$app->request->hostName;
            }


        return Robots::findOne(['city_id' => Yii::$app->city->getId()]) ?
                Robots::findOne(['city_id' => Yii::$app->city->getId()])->content : false;
    }

}
