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

                <?= app\modules\slider\widgets\MainSlider::widget(['system_name' => 'gruzchiki']) ?>

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

                        <?= \app\modules\link_block\widgets\LinkBlockWidget::widget(['sysname' => 'takelazh_1']) ?>

                        <div class="h2 header-line">Наши тарифы</div>

                        <?= app\modules\tarif\widgets\Takelazh::widget() ?>

                        <?= \app\modules\link_block\widgets\LinkBlockWidget::widget(['sysname' => 'takelazh_2']) ?>

                        <?php if ($this->params['cases'] && $this->params['cases'][0] != null) { ?>
                            <div class="portfolio slide">
                                <div class="container">
                                    <div class="h2 header-line">Кейсы</div>

                                    <?= app\modules\cases\widgets\Slider::widget(['items' => $this->params['cases']]); ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>

                <?php if (isset($this->content_seo_1) && $this->content_seo_1): ?>

                    <div class="seo-text">
                        <div class="container">
                            <?= $this->content_seo_1 ?>
                        </div>
                    </div>

                <?php endif; ?>

                <div class="autopark color-slide">
                    <div class="container">

                        <div class="h2 header-line">Автопарк</div>
                        <?= \app\modules\autopark\widgets\Slider::widget() ?>
                    </div>
                </div>

                <?php if (isset($this->content_seo_2) && $this->content_seo_2): ?>

                    <div class="seo-text">
                        <div class="container">
                            <?= $this->content_seo_2 ?>
                        </div>
                    </div>

                <?php endif; ?>


                <div class="calc color-slide" style="margin-bottom: 6rem;">
                    <div class="container">

                        <div class="h2 header-line" style="margin-bottom: 4rem;">Калькулятор</div>
                        <?= \app\modules\calc\widgets\Calc::widget(['type' => 'gruzchik']) ?>
                    </div>
                </div>

                <?php echo $this->render('_reviews') ?>

                <?= $this->render('_footer') ?>

            </div>
        </div>ы

        <?= Yii::$app->info::get('counters'); ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
