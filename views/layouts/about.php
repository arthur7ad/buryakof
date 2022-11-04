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

                <?= app\modules\slider\widgets\MainSlider::widget(['system_name' => 'about']) ?>

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
                    </div>

                    <div class="advantages slide">
                        <div class="container">
                            <div class="h2 header-line">Наши преимущества</div>

                            <p class='text'>
                                Организуем комплексные переезды, предлагаем услуги такелажных работников, предоставляем в распоряжение заказчика склад для ответственного хранения.
                            </p>

                            <?= $this->render('@app/views/layouts/_advantages', ['type' => 1]) ?>

                        </div>
                    </div>
                    <?php if ($this->params['galery']) { ?>
                        <div class="portfolio slide">
                            <div class="container">
                                <div class="h2 header-line"><?=$this->params['galery']->name;?></div>

                                <?= app\modules\galery\widgets\GalleryList::widget(['gallery' => $this->params['galery']->id]); ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($this->params['cases'] && $this->params['cases'][0] != null) { ?>
                        <div class="portfolio slide">
                            <div class="container">
                                <div class="h2 header-line">Кейсы</div>

                                <?= app\modules\cases\widgets\Slider::widget(['items' => $this->params['cases']]); ?>
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


                    <?php echo (Yii::$app->request->url = '/o-kompanii') ?  $this->render('_reviews') : '' ?>
                </div>

                <?= $this->render('_footer', ['marginTop' => true]) ?>

            </div>
        </div>

        <?= Yii::$app->info::get('counters'); ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
