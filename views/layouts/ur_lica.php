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

                <?= app\modules\slider\widgets\MainSlider::widget(['system_name' => 'ur_lica']) ?>

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

                        <?= \app\modules\link_block\widgets\LinkBlockWidget::widget(['sysname' => 'ur_lica_1']) ?>

                        <?php if (isset($this->content_seo_1) && $this->content_seo_1): ?>

                            <div class="seo-text">
                                <div class="container">
                                    <?= $this->content_seo_1 ?>
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
                <div class="container bottom-padding">
                    <div class="content">
                        <div class="advantages slide">
                            <div class="h2 header-line">Наши преимущества</div>

                            <p class='text'>
                                Организуем комплексные переезды, предлагаем услуги такелажных работников, предоставляем в распоряжение заказчика склад для ответственного хранения.
                            </p>

                            <?= $this->render('@app/views/layouts/_advantages', ['type' => 3]) ?>

                        </div>
                    </div>
                </div>
                <?php if ($this->params['has_clients']) { ?>
                    <div class="portfolio slide">
                        <div class="container">
                            <div class="h2 header-line">Наши клиенты</div>

                            <?= app\modules\clients\widgets\Slider::widget(); ?>
                        </div>
                    </div>
                <?php } ?>


                <?php echo $this->render('_reviews') ?>

                <?= $this->render('_footer') ?>

            </div>
        </div>

        <?= Yii::$app->info::get('counters'); ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
