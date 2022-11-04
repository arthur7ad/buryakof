<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use app\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

    <?= $this->render('_head', ['model' => $this]) ?>

    <body>
        <?php $this->beginBody() ?>

        <div class="wrap home">

            <?php echo $this->render('_header', ['home' => true, 'slider' => true]) ?>

            <div class="container-fluid">

                <div class="site-index">

                    <?= app\modules\slider\widgets\MainSlider::widget(['system_name' => 'home_slider']) ?>

                    <div class="container">
                        <?= Alert::widget() ?>
                    </div>

                    <?= \app\modules\link_block\widgets\LinkBlockWidget::widget(['sysname' => 'home_1']) ?>

                    <?= $content ?>


                    <div class="utp color-slide">
                        <div class="container">

                            <?= \app\modules\utp\widgets\Slider::widget() ?>

                        </div>
                    </div>
					
					  <div class="calc color-slide" style="margin-bottom: 6rem;">
                            <div class="container">

                                <div class="h2 header-line" style="margin-bottom: 4rem;">Калькулятор</div>
                                <?= \app\modules\calc\widgets\Calc::widget(['type' => 'pereezd']) ?>
                            </div>
                        </div>

                    <?php if (isset($this->content_seo_1) && $this->content_seo_1): ?>

                        <div class="seo-text">
                            <div class="container">
                                <?= $this->content_seo_1 ?>
                            </div>
                        </div>

                    <?php endif; ?>

                    <?= app\modules\forms\widgets\BlanketOrder::widget() ?>

                    <?php if (isset($this->content_seo_2) && $this->content_seo_2): ?>

                        <div class="seo-text">
                            <div class="container">
                                <?= $this->content_seo_2 ?>
                            </div>
                        </div>

                    <?php endif; ?>


                    <div class=" <?php if(0) { ?>autopark<?php } ?> color-slide">
                        <div class="container">


                            <?php if(0) { ?>
                            <?= \app\modules\autopark\widgets\Slider::widget() ?>
                            <?php } else { ?>
                            <?= \app\modules\autopark\widgets\ParkList::widget(); ?>
                            <?php } ?>
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

                    <?= $this->render('_how_we_work'); ?>

                    <?php echo $this->render('_reviews') ?>

                </div>


            </div>

            <?php echo $this->render('_footer') ?>

        </div>

        <?= Yii::$app->info::get('counters'); ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
