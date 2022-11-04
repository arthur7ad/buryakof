<?php

namespace app\modules\yml\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

    public function actionIndex() {

        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'text/xml');

        $result = '<yml_catalog date="' . date('Y-m-d h:m', time()) . '">' . PHP_EOL;
        $result .= '<shop>' . PHP_EOL;
        $result .= '<name>' . Yii::$app->info::get('name') . '</name>' . PHP_EOL;
        $result .= '<company>' . Yii::$app->info::get('company') . '</company>' . PHP_EOL;
        $result .= '<url>' . Yii::$app->info::get('url') . '</url>' . PHP_EOL;
        $result .= '<offers>' . PHP_EOL;

        $model = \app\modules\page\models\Page::find()
                        ->where([
                            'is_enable' => 1,
                            'template_id' => [2, 3],
                        ])->all();

        foreach ($model as $item) {
            $result .= '<offer id="' . $item->id . '" available="true">
<url>' . Url::to($item->Url, true) . '</url>
<price>' . $item->price . '</price>
<currencyId>RUR</currencyId>
<delivery>true</delivery>
<name>' . $item->name . '</name>
<vendor>' . Yii::$app->info::get('company') . '</vendor>
<description>' . $item->yml_description . '</description>
</offer>';
        }
        $result .= '</offers>' . PHP_EOL;
        $result .= '</shop>' . PHP_EOL;
        $result .= '</yml_catalog>' . PHP_EOL;

        return $result;
    }

}
