<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\modules\catalog\models\Catalog;

class RedirectsController extends Controller {

    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionCreate() {

        $string = '';

        $lines = file_get_contents(Yii::getAlias('@app/redirects.txt'));
        $lines = file(Yii::getAlias('@app/redirects.txt'));

//        echo $lines;

        foreach ($lines as $line):

            $arr = explode('	', $line);

            if (isset($arr[0]) && isset($arr[1])) {

//                if ($arr[0][1] == '?')
//                    $string .= 'if ( $request_uri ~ ^\\' . $arr[0] . '$) {
//        rewrite ^ ' . $arr[1] . ' permanent;
//    }';
//                else
                $string .= '
    if ( $request_uri ~ ^' . $arr[0] . '$) {
        rewrite ^ ' . str_replace(PHP_EOL, '', $arr[1]) . '? permanent;
    }';
            }

            echo $arr[0] . ' = ' . $arr[1] . PHP_EOL;

        endforeach;
//        foreach ($cats as $cat):
//
//            if ($cat->old_redirect_url)
//                $string .= '
//    if ( $request_uri ~ ^' . $cat->old_redirect_url . '$) {
//        rewrite ^ ' . $cat->url . ';
//    }';
//
//        endforeach;

        file_put_contents(Yii::getAlias('@app/redirects'), $string, LOCK_EX);
    }

}
