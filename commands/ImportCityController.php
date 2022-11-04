<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use ZipArchive;
use app\modules\catalog\models\Catalog;
use app\modules\category\models\Category;
use yii\helpers\Inflector;

class ImportCityController extends Controller {

    public function actionIndex() {

        echo 'start import';
        Yii::$app->db->createCommand()->checkIntegrity(false)->execute();
        Yii::$app->db->createCommand()->truncateTable('city')->execute();
        Yii::$app->db->createCommand()->checkIntegrity(true)->execute();


        $row = 1;

        $data = \moonland\phpexcel\Excel::widget([
                    'mode' => 'import',
//                    'fileName' => Yii::getAlias('@app') . '/commands/catalog.xlsx',
                    'fileName' => Yii::getAlias('@app') . '/commands/poddomeny.ods',
                    'setFirstRecordAsKeys' => false, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
                    'setIndexSheetByName' => false, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
                    'getOnlySheet' => '15 миллионников', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
        ]);


        foreach ($data as $n => $row):

//            echo $n;

            if ($n == 1)
                continue;

            $model = new \app\modules\city\models\City();

            $model->name = $row['A'];

            $arr = explode('.', $row['B']);

            $model->name_eng = $arr[0];

            $arr = explode(',', $row['G']);

            $model->latitude = $arr[0];
            $model->longitude = trim($arr[1]);

            $model->is_enable = 1;
            $model->is_default = $n == 2 ? 1 : 0;

            $model->oblast = $row['C'];
            $model->atcity = $row['D'];
            $model->incity = $row['E'];
            $model->prilagat = $row['F'];

            $model->save();



            print_r($row);

//            $row++;
        endforeach;
    }

}
