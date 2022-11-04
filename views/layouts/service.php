<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\components\Breadcrumbs;
use app\widgets\BreadcrumbsMicrodata;
use app\assets\AppAsset;
use app\modules\region_templates\models\RegionTemplates;
use app\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <?= $this->render('_head', ['model' => $this]) ?>
    <body>
        <?php $this->beginBody() ?>

        <div class="service">
            <div class="wrap">

                <?= $this->render('_header') ?>

                <div class="slider">
                    <div class="slider-wrap">

                        <?= $this->render('_slider', ['model' => $this]); ?>
                    </div>
                    <div class="container-wrap">
                        <div class="container">
                            <?php Html::img('/image/car.png', ['class' => 'img-car', 'alt' => 'Car']) ?>
                            <?= app\modules\calc\widgets\Calc::widget() ?>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="content">
                        <?php
                        BreadcrumbsMicrodata::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>
                        <?= Alert::widget() ?>
                        <div id="content">
                            <?= $content ?>
                        </div>
                    </div>
                </div>

                <?= $this->render('_how_we_work', ['model' => $this]); ?>
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
                <?php if ($this->contentBottom): ?>

                    <br/>

                    <div class="container">
                        <div class="content2">
                            <?= $this->contentBottom ?>
                        </div>
                    </div>

                    <br/>

                <?php endif; ?>

                <div class="order-phone-form color-slide-2">
                    <div class="container">

                        <?= \app\modules\forms\widgets\CallBack::widget() ?>

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
