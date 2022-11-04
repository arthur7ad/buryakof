<?php
/* @var $this \yii\web\View */
/* @var $content string */

/*        ------------      */
/*           Шаблон для переезды     */
/*        ------------      */

use yii\helpers\Html;
use app\components\Breadcrumbs;
use app\assets\AppAsset;
use app\modules\region_templates\models\RegionTemplates;
use app\widgets\Alert;

$this->registerCssFile('/css/layout/default.css');
$this->registerCssFile('/css/landing/gorodskie-pereezdy.css');
$this->registerCssFile('/css/landing/landing.css');

$this->registerJsFile('/js/landing/common.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

//Yii::error(Yii::$app->ipgeobase->getLocation(Yii::$app->request->userIP));

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <?= $this->render('../_head', ['model' => $this]) ?>

    <script>

        var address = false;

    </script>

    <body>
        <?php $this->beginBody() ?>

        <div class="landing page">
            <div class="wrap">

                <?php echo $this->render('_header_landing', ['slider' => true]) ?>

                <?= app\modules\slider\widgets\LandingSlider::widget() ?>

                <div class="bottom-padding">
                    <div class="content">
                        <?=
                        Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>
                        <?= Alert::widget() ?>
                        <div id="content">
                            <?= $content ?>
                        </div>

                        <div id="usl">

                            <?=
                            \app\modules\link_block\widgets\LinkBlockWidget::widget([
                                'sysname' => 'pereezd_landing', 'count' => 4
                            ])
                            ?>

                        </div>

                        <div class="tar-wrap">

                            <div id="tar" class="h2 header-line">Тарифы</div>

                            <div class="container">
                                <div class="hidden-xs hidden-sm hidden-md">
                                    <?= app\modules\tarif\widgets\PereezdGorod::widget() ?>
                                </div>
                                <div class="hidden-lg">
                                    <?= app\modules\tarif\widgets\PereezdGorodSlider::widget() ?>
                                </div>
                            </div>
                        </div>

                        <div id="advantages" class="advantages slide">
                            <div class="container">
                                <div class="h2 header-line">Почему нас выбирают</div>

                                <?= $this->render('@app/views/layouts/_advantages', ['type' => 1]) ?>

                            </div>
                        </div>


                        <div id="calc" class="calc color-slide" style="margin-bottom: 6rem;">
                            <div class="container">

                                <div class="h2 header-line" style="margin-bottom: 4rem;">Калькулятор</div>
                                <?= \app\modules\calc\widgets\Calc::widget(['type' => 'pereezd']) ?>
                            </div>
                        </div>



                    </div>

                    <?= $this->render('../_how_we_work'); ?>



                    <div class="map" id="con">

                        <?=
                        \app\modules\forms\widgets\Contact::widget([
                            'title' => 'Оставить заявку',
                        ]);
                        ?>

                        <div id="contactMap">

                        </div>

                    </div>

                </div>


                <?= $this->render('_footer') ?>

            </div>
        </div>
<script>
    $('.city-wrap').hide();
</script>
        <?php echo Yii::$app->info::get('counter_landing_gorodskie-pereezdy'); ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
