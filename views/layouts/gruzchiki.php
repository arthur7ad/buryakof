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

                        <div class="h2 header-line">НАШИ ТАРИФЫ</div>

                        <?php
                        if (Yii::$app->request->url == '/gruzchiki/vynos-stroitel-nogo-musora')
                            echo app\modules\tarif\widgets\VyvozMusora::widget();
                        else
                            echo app\modules\tarif\widgets\Gruzchiki::widget();
                        ?>

                        <?php if (isset($this->content_seo_1) && $this->content_seo_1): ?>

                            <div class="seo-text">
                                <div class="container">
                                    <?= $this->content_seo_1 ?>
                                </div>
                            </div>

                        <?php endif; ?>

                        <?= \app\modules\link_block\widgets\LinkBlockWidget::widget(['sysname' => 'gruzchiki']) ?>


                        <?php if (isset($this->content_seo_2) && $this->content_seo_2): ?>

                            <div class="seo-text">
                                <div class="container">
                                    <?= $this->content_seo_2 ?>
                                </div>
                            </div>

                        <?php endif; ?>


                    </div>

                </div>

                <?= app\modules\forms\widgets\BlanketOrder::widget() ?>


                <?php if ($this->params['cases'] && $this->params['cases'][0] != null) { ?>
                    <div class="portfolio slide">
                        <div class="container">
                            <div class="h2 header-line">Кейсы</div>

                            <?= app\modules\cases\widgets\Slider::widget(['items' => $this->params['cases']]); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($this->params['feedback']) { ?>
                    <div class="portfolio slide">
                        <div class="container">
                            <div class="h2 header-line">Отзывы</div>

                            <?= app\modules\feedback\widgets\Slider::widget(['feedback' => $this->params['feedback']]); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($this->params['has_clients']) { ?>
                    <div class="portfolio slide">
                        <div class="container">
                            <div class="h2 header-line">Наши клиенты</div>

                            <?= app\modules\clients\widgets\Slider::widget(); ?>
                        </div>
                    </div>
                <?php } ?>

                <div class="advantages slide">
                    <div class="container">
                        <div class="h2 header-line">Наши преимущества</div>

                        <p class='text'>
                            Организуем комплексные переезды, предлагаем услуги такелажных работников, предоставляем в распоряжение заказчика склад для ответственного хранения.
                        </p>

                        <?= $this->render('@app/views/layouts/_advantages', ['type' => 2]) ?>

                    </div>
                </div>


                <div class="calc color-slide" style="margin-bottom: 6rem;">
                    <div class="container">

                        <div class="h2 header-line" style="margin-bottom: 4rem;">Калькулятор</div>
                        <?= \app\modules\calc\widgets\Calc::widget(['type' => 'gruzchik']) ?>
                    </div>
                </div>

                <?php echo $this->render('_reviews') ?>

                <?= $this->render('_footer') ?>

            </div>
        </div>

        <?= Yii::$app->info::get('counters'); ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
