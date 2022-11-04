<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use himiklab\ipgeobase\IpGeoBase;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller {

    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionUpdateDb() {
        $c = new IpGeoBase();
        $c->updateDB();
    }

    public function actionIndex() {

        $ip = new \app\components\ipdata\IpGeoBase();
        $ip->updateDB();

//        \app\components\ipdata\IpGeoBase::updateDB();
    }

    public function actionUrl2() {

        foreach (\app\models\Url::find()->all() as $item):

            $item->url = trim($item->url);
            $item->url = str_replace('	', '', $item->url);
            $item->save();

        endforeach;
    }

    public function actionUrl() {

        foreach (\app\modules\url\models\Url::find()->all() as $item):

            $item->url = '/' . $item->url;
            $item->save();

        endforeach;
    }

    public function actionName() {

        foreach (\app\modules\page\models\Page::find()->all() as $item):

//            $item->name = ucfirst(trim($item->name));

            $arr = explode(' ', $item->name);

            if (isset($arr[0])) {
                $arr[0] = mb_convert_case($arr[0], MB_CASE_TITLE, "UTF-8");
            }

            $item->name = implode(' ', $arr);

            echo $item->name . PHP_EOL;

            $item->save();

        endforeach;
    }

}
