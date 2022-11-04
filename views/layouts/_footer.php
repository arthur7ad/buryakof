<?php

use yii\bootstrap\Html;
use app\modules\menu\models\Menu;
use app\modules\region_templates\models\RegionTemplates;

$this->registerCssFile('/css/footer.css?206');
?>

    <link href="/css/colorbox.css?2021" rel="stylesheet">
<a href="#" class="footer-up" onclick="$('html, body').stop().animate({scrollTop: 0}, 800, 'swing'); return false;">
    <?= Html::img('/image/arr_top.png', ['height' => 40]) ?>
</a>
    <a href="https://wa.me/79204598988" class="dir-whatsapp dir-whatsapp-second">
        <?= Html::img('/image/dir_whatsapp_2.png', ['width' => 80]) ?>
    </a>
<a href="https://wa.me/79202299328" class="dir-whatsapp">
    <?= Html::img('/image/dir_whatsapp.png', ['width' => 80]) ?>
</a>
<div class="all_review" >

    <div class="container">
        <div class="h2 header-line">Независимые отзывы</div>
        <div class="row">
            <div class="yandex">
                <iframe src="https://yandex.ru/sprav/widget/rating-badge/26570187939" width="150" height="50" frameborder="0"></iframe>
            </div>
            <div class="google">
                <a rel="nofollow" target="_blank" href="https://www.google.ru/search?q=%D0%B1%D1%83%D1%80%D1%8F%D0%BA%D0%BE%D0%B2&newwindow=1&sxsrf=ALiCzsaA3dz29aEalzriVa2e2ePcRT-v8Q%3A1652717218992&ei=onaCYuaPPOyMrgT_pYWIBg&ved=0ahUKEwjm6IG2s-T3AhVshosKHf9SAWEQ4dUDCA4&uact=5&oq=%D0%B1%D1%83%D1%80%D1%8F%D0%BA%D0%BE%D0%B2&gs_lcp=Cgdnd3Mtd2l6EAMyBAgjECcyBAgjECcyBAgjECcyCggAEIAEEIcCEBQyDQguEIAEEIcCENQCEBQyBQguEIAEMgUIABCABDIFCC4QgAQyBQguEIAEMgUIABCABDoHCCMQsAMQJzoHCAAQRxCwA0oECEEYAEoECEYYAFClBFjBBWDrBmgBcAF4AIABeIgB7AGSAQMwLjKYAQCgAQHIAQrAAQE&sclient=gws-wiz#lrd=0x413b2f35502fdc69:0xdd56fd6a84c867e"><img src="/image/google.jpg" style="height:50px;"/></a>
            </div>
            <div class="2gis">
                <a rel="nofollow" target="_blank" href="https://go.2gis.com/sm8ddf"><img src="/image/2gis.jpg" style="height:40px;"></a>
            </div>
            <div class="flamp">
                <a rel="nofollow" target="_blank" href="https://voronezh.flamp.ru/firm/buryakov_kompaniya_gruzovykh_perevozok-70000001035978506#reviews"><img src="/image/flamp.jpg" style="height:40px;"></a>
            </div>
        </div>

    </div>
</div>
<footer class="footer <?= isset($marginTop) ? 'margin-top' : '' ?>">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3 logo-wrap">
                <?= Html::img('/image/logo.png', ['class' => 'img img-responsive', 'alt' => 'Логотип', 'width' => 100]);
                ?>
                <p><?= Yii::$app->info::get('copy') ?></p>

                <?php echo RegionTemplates::getVal('footer-phones') ?>

                <div class="work-time">
                    <?= Yii::$app->info::get('work_time') ?>
                </div>
                <br>
                <div>
                    Цены на сайте не являются публичной офертой.
                </div>
            </div>

            <div class="col-xs-6 col-sm-4 col-md-2 menu-1">
                <p class='title'>О компании:</p>
                <ul class="list-unstyled">
                    <?php echo Menu::getFooterItems(2) ?>
                </ul>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2 menu-2">
                <p class='title'>Услуги:</p>

                <ul class="list-unstyled">
                    <?php echo Menu::getFooterItems(3) ?>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2 menu-payment">
                <p class='title'>Способы оплаты:</p>
                <ul class="list-unstyled">
                    <li><img src="/image/nal.png" alt="Наличный"/><p>Наличный</p></li>
                    <li><img src="/image/beznal.png" alt="Безналичный"/><p>Безналичный</p></li>
                    <li><img src="/image/card.png" alt="Банковской картой"/><p>Банковской картой</p></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 text-right right-side">

                <button type="button" class="btn btn-yellow"
                        data-toggle="modal" data-target="#callback-form-modal"
                        onClick="ym(53972095, 'reachGoal', 'zvonoz')">
                    <img src="/image/ico/call.png" alt="phone ico"> Заказать звонок
                </button>
                <?=
                Html::a('Калькулятор', '/calc', ['class' => 'btn btn-calc'])
                ?>

                <?= $this->render('_social') ?>
            </div>
        </div>
    </div>
    <?= app\modules\forms\widgets\ThanksModal::widget(); ?>
</footer>
<style>
    #cboxContent img {
        height:100%;
        max-width:100%;
    }
</style>


<?= \app\modules\city\widgets\CityChoice::widget() ?>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M2VHW5K"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


<?php
if (Yii::$app->user->isGuest):

   // echo \app\modules\user\widgets\LoginPopup::widget();
   // echo \app\modules\user\widgets\RegisterPopup::widget();

endif;
?>