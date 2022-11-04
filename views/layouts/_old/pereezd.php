<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\components\Breadcrumbs;
use app\assets\AppAsset;
use app\modules\region_templates\models\RegionTemplates;
use app\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        // Свои метатеги
//        RegionTemplates::getInHeader();
        ?>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="pereezd">
            <div class="wrap">

                <?= $this->render('_header') ?>

                <div class="slider">
                    <div class="slider-wrap">

                        <?= $this->render('_slider', ['model' => $this]); ?>
                    </div>
                    <div class="container-wrap">
                        <div class="container">
                            <?php Html::img('/image/car.png', ['class' => 'img-car', 'alt' => 'Car']) ?>
                            <?php echo app\modules\calc\widgets\CalcLocal::widget() ?>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="content">
                        <?php
                        Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>
                        <?= Alert::widget() ?>
                        <div id="content">
                            <?= $content ?>
                        </div>
                    </div>
                </div>

                <?= $this->render('_preem', ['model' => $this]); ?>

                <?php $this->render('_calc') ?>

                <?= $this->render('_have_question') ?>

                <?= $this->render('_footer') ?>

            </div>
        </div>

        <?= Yii::$app->info::get('counters'); ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
