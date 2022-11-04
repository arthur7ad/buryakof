<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\components\Breadcrumbs;
use app\widgets\BreadcrumbsMicrodata;
use app\assets\AppAsset;
use app\modules\region_templates\models\RegionTemplates;
use app\widgets\Alert;

$this->registerCssFile('/css/layout/default.css');

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <?= $this->render('_head', ['model' => $this]) ?>
    <body>
        <?php $this->beginBody() ?>

        <div class="page">
            <div class="wrap">

                <?= $this->render('_header', ['slider' => true]) ?>

                <?= app\modules\slider\widgets\MainSlider::widget(['system_name' => 'dostavka_gruzov']) ?>

                <div class="container bottom-padding">
                    <div class="content">
                        <?=
                        BreadcrumbsMicrodata::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>
                        <?= Alert::widget() ?>
                        <div id="content">
                            <?= $content ?>
                        </div>

                        <div class="h4 text-uppercase text-center green">Грузоперевозки</div>

                        <?= app\modules\tarif\widgets\Gruzoperevozki::widget() ?>

                        <div class="h4 text-uppercase text-center green">Переезды</div>

                        <?= app\modules\tarif\widgets\Pereezdi::widget() ?>

                        <div class="h2 gruzoperevozki-title">Грузчики</div>

                        <?= app\modules\tarif\widgets\Gruzchiki::widget() ?>

                        <div class="h2 gruzoperevozki-title">Такелаж</div>

                        <?= app\modules\tarif\widgets\Takelazh::widget() ?>

                        <div class="h2 gruzoperevozki-title">Вывоз мусора</div>

                        <?= app\modules\tarif\widgets\VyvozMusora::widget() ?>

                        <div class="disclaimer text-muted h2">Cтоимость услуг может быть скорректирована</div>
                    </div>

                    <?php echo $this->render('_reviews') ?>

                </div>

                <?= $this->render('_footer', ['marginTop' => true]) ?>

            </div>
        </div>

        <?= Yii::$app->info::get('counters'); ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
