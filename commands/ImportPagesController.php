<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use ZipArchive;
use app\modules\catalog\models\Catalog;
use app\modules\category\models\Category;
use yii\helpers\Inflector;

class ImportPagesController extends Controller {

    public function actionIndex() {

        echo 'start import';
        Yii::$app->db->createCommand()->checkIntegrity(false)->execute();
        Yii::$app->db->createCommand()->truncateTable('url')->execute();
        Yii::$app->db->createCommand()->truncateTable('page')->execute();
        Yii::$app->db->createCommand()->checkIntegrity(true)->execute();


        $row = 1;

        $data = \moonland\phpexcel\Excel::widget([
                    'mode' => 'import',
//                    'fileName' => Yii::getAlias('@app') . '/commands/catalog.xlsx',
                    'fileName' => Yii::getAlias('@app') . '/commands/pages.xlsx',
                    'setFirstRecordAsKeys' => false, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
                    'setIndexSheetByName' => false, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
                    'getOnlySheet' => 'ДЛя внесения', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
        ]);

        $parent = false;
        $parent_url = false;

        foreach ($data as $n => $row):

            if ($row['A']) {

                $model = new \app\modules\page\models\Page();
                $model->header = $row['A'];

                $url = new \app\models\Url();
                $parent_url = $url->url = \app\components\Translite::str2url($model->header);
                $url->title = $model->header;
                $url->save();
                $model->url_id = $url->id;


                $model->parent_id = 0;
                $model->save();

                $parent = $model->id;
            } else {
                if ($row['B']) {

                    $model = new \app\modules\page\models\Page();
                    $model->header = $row['B'];

                    $url = new \app\models\Url();
                    $url->url = $parent_url . '/' . \app\components\Translite::str2url($model->header);
                    $url->title = $model->header;
                    $url->save();
                    $model->url_id = $url->id;


                    $model->parent_id = $parent;
                    $model->save();
                }
            }


            print_r($row);

//            $row++;
        endforeach;
    }

}
