<?php

namespace app\modules\calc\widgets;

use Yii;
use yii\base;
use yii\helpers\Html;
use yii\base\Widget;
use app\modules\calc\models\GruzCalcForm;

class Calc extends Widget {

    public $type = 'gruz';

    public function run() {

        \app\modules\calc\Assets::register($this->view);


        $get = Yii::$app->request->get();
        Yii::error($get);

        if (isset($get['calc']))
            $this->type = $get['calc'];


        switch ($this->type):

            case 'pereezd' :
                $model = new \app\modules\calc\models\PereezdCalcForm();

                return $this->render('calc_pereezd', [
                            'model' => $model,
                            'type' => 'perev',
                ]);

                break;

            case 'gruzchik' :

                $model = new \app\modules\calc\models\GruzchikCalcForm();

                if ($model->load(Yii::$app->request->post()) && $model->validate()) {

                    $model->body = $model->name . ' заказал грузчиков' . PHP_EOL
                            . 'Телефон: ' . $model->phone . PHP_EOL . ''
                            . 'Время: ' . $model->time . ' час ' . PHP_EOL . ''
                            . 'Количество: ' . $model->count . PHP_EOL . ''
                            . 'Инструмент: ' . ($model->is_instrument ? 'Да ' : 'Нет') . PHP_EOL . ''
                            . 'Ремни: ' . ($model->is_remni ? 'Да ' : 'Нет') . PHP_EOL . ''
                            . 'Рохля: ' . ($model->is_rohlia ? 'Да ' : 'Нет') . PHP_EOL . ''
                            . 'Цена: ' . $model->summ;
                    if ($model->contact())
                        \Yii::$app->getSession()->setFlash('success', 'Сообщение успешно отправлено');
                    else
                        \Yii::$app->getSession()->setFlash('error', 'Возникла ошибка при отправке сообщения');
                }

                return $this->render('calc_gruzchik', [
                            'model' => $model,
                            'type' => 'gruzchik',
                ]);

                break;

            default :
                $model = new \app\modules\calc\models\GruzCalcForm();

                return $this->render('calc_gruz', [
                            'model' => $model,
                            'type' => 'gruz',
                ]);


        endswitch;
    }

}
