<?php
/* @var $this \yii\web\View */
/* @var $content string */

/*        ------------      */
/*           Шаблон для хранение     */
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







            </div>




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
