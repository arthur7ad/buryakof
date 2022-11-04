<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use ZipArchive;
use app\modules\url\models\Url;
use yii\helpers\Inflector;

class ImportMetaController extends Controller {

    public function actionIndex() {

        echo 'start import';


        $row = 1;

        $data = \moonland\phpexcel\Excel::widget([
                    'mode' => 'import',
//                    'fileName' => Yii::getAlias('@app') . '/commands/catalog.xlsx',
                    'fileName' => Yii::getAlias('@app') . '/commands/metategi.ods',
                    'setFirstRecordAsKeys' => false, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
                    'setIndexSheetByName' => false, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
                    'getOnlySheet' => 'ДЛя внесения', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
        ]);


        foreach ($data as $n => $row):

//            echo $n;

            if ($n == 1)
                continue;

//
            $model = Url::findOne(['title' => $row['A']]);

            if ($model) {
                $model->title = $row['C'];
                $model->description = $row['D'];

                if (isset($model->page)) {
                    $model->page->name = $row['B'];


                    $model->page->save();
                }

                $model->save();
            }
//
            $model = Url::findOne(['title' => $row['B']]);

            if ($model) {
                $model->title = $row['C'];
                $model->description = $row['D'];

                if (isset($model->page)) {
                    $model->page->name = $row['B'];


                    $model->page->save();
                }

                $model->save();
            }
//            print_r($row);
//            $row++;
        endforeach;
    }

}
