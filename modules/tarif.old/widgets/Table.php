<?php

namespace app\modules\tarif\widgets;

use Yii;
use yii\base;
use yii\base\Widget;
use app\modules\tarif\models\Tarif;

class Table extends Widget {

//    public $city_id;

    public function init() {

        parent::init();
    }

    public function run() {

        \app\modules\tarif\ModuleAsset::register($this->view);

        $city_id = \app\modules\city\models\City::getCityIdByName(Yii::$app->city->current_city);

        $tabs = [];

        $model = Tarif::find()
                        ->joinWith('toCity')
                        ->where([
                            'from_id' => $city_id,
                        ])->orderBy(['city.name' => SORT_ASC])->all();

        foreach ($model as $item):

            if ($item->t2_otdelno || $item->t2_dogruz)
                $tabs['2т'][] = ['city' => $item->toCity->name, 'pr_o' => $item->t2_otdelno, 'pr_d' => $item->t2_dogruz];

            if ($item->t5_otdelno || $item->t5_dogruz)
                $tabs['5т'][] = ['city' => $item->toCity->name, 'pr_o' => $item->t5_otdelno, 'pr_d' => $item->t5_dogruz];

            if ($item->t10_otdelno || $item->t10_dogruz)
                $tabs['10т'][] = ['city' => $item->toCity->name, 'pr_o' => $item->t10_otdelno, 'pr_d' => $item->t10_dogruz];

            if ($item->t20_otdelno || $item->t2_dogruz)
                $tabs['20т'][] = ['city' => $item->toCity->name, 'pr_o' => $item->t20_otdelno, 'pr_d' => $item->t20_dogruz];

            if ($item->trall_otdelno || $item->trall_dogruz)
                $tabs['тралл'][] = ['city' => $item->toCity->name, 'pr_o' => $item->trall_otdelno, 'pr_d' => $item->trall_dogruz];

        endforeach;




        return $this->render('table', [
                    'model' => $model,
                    'tabs' => $tabs,
        ]);
    }

}
