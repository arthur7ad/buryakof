<?php

use yii\bootstrap\Html;
use app\modules\menu\models\Menu;
use app\modules\region_templates\models\RegionTemplates;

$this->registerCssFile('/css/footer.css?201');
?>

<a href="https://wa.me/79202299328" class="dir-whatsapp">
    <?= Html::img('/image/dir_whatsapp.png', ['height' => 100]) ?>
</a>

<footer class="footer">

    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-md-3">
                <?php echo RegionTemplates::getVal('adres') ?>
            </div>

            <div class="col-sm-6 col-md-3">
                <?= Yii::$app->info::get('landing_footer_phone') ?>
            </div>

            <div class="col-sm-6 col-md-3">
                <?= Html::a(Yii::$app->info::get('email'), 'mailto:' . Yii::$app->info::get('email')) ?>
            </div>

            <div class="col-sm-6 col-md-3">
                <?= $this->render('../_social') ?>
            </div>
        </div>
    </div>
    <?= app\modules\forms\widgets\ThanksModal::widget(); ?>
</footer>

<?= \app\modules\city\widgets\CityChoiceLanding::widget() ?>

<?php
if (Yii::$app->user->isGuest):

   // echo \app\modules\user\widgets\LoginPopup::widget();
   // echo \app\modules\user\widgets\RegisterPopup::widget();

endif;
?>