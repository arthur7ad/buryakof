<?php

use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\modules\menu\models\Menu;
use yii\helpers\ArrayHelper;
use app\modules\region_templates\models\RegionTemplates;
use app\modules\city\models\City;
?>

<div class="mobile-menu hidden-md hidden-lg">
    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                <?= Yii::$app->info::get('headTelephone') ?> 
            </div>   
            <div class="col-xs-3 text-right">
                <?php
                echo Html::a(
                        Html::img('/image/humburger.png', ['alt' => 'Выпадающее меню']),
//                        'javascript:void(0);'
                        '#menu'
                        , [
//                    'data-toggle' => "modal",
//                    'data-target' => "#modal-menu",
                ]);
                ?>
            </div>
            <div class="col-xs-12 text-center city-menu">
                <br/>
                <?php
                echo Html::a(
                        '<i class="fa fa-map-pin" aria-hidden="true"></i>   ' .
                        City::getCityNameByCode(Yii::$app->city->current_city), 'javascript:void(0);', [
                    'data-toggle' => "modal",
                    'data-tooltip' => "tooltip",
                    'data-target' => "#city-modal",
                    'data-placement' => "bottom",
                    'title' => Yii::$app->city->title,
                ]);
                ?>
                <p><?php echo explode(' ',\app\modules\region_templates\models\RegionTemplates::getVal('adres'),3)[2] . ' ' . 'ежедневно с 08.00 - 20.00'; ?></p>
                <br/>
                <br/>
            </div>
            <div class="col-xs-6">

                <button type="button" class="btn btn-link" 
                        data-toggle="modal" data-target="#callback-form-modal"
                        onClick="ym(53972095, 'reachGoal', 'zvonoz')">
                    <span><img src="/image/ico/phone.svg" alt="phone ico"> Обратный звонок</span>
                </button>
            </div>   
            <div class="col-xs-6 text-right">
                <?= Html::a('Калькулятор', '/calc', ['class' => 'btn btn-link']) ?>

            </div>   


            <div class="col-xs-12">
                <?= $this->render('_logo') ?>
            </div>   
        </div>   
    </div>
</div>

<div class="hidden-xs hidden-sm header <?php if (isset($slider) && $slider) echo 'slider-on'; ?>">

    <div class="container">
        <div class="desktop">
            <div class="row line-wrap">
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-3">
                    <div class="hidden-md hidden-lg">
                        <?= $this->render('_logo') ?>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-2 col-md-4 col-lg-4 city-wrap">
                    <?php
                    echo Html::a(
                            '<i class="fa fa-map-pin" aria-hidden="true"></i>   ' .
                            City::getCityNameByCode(Yii::$app->city->current_city), 'javascript:void(0);', [
                        'id' => "city-choise-link",
                        'data-toggle' => "modal",
                        'data-tooltip' => "tooltip",
                        'data-target' => "#city-modal",
                        'data-placement' => "bottom",
                        'title' => Yii::$app->city->title,
                    ]);
                    ?>
                    <p><?php echo explode(' ',\app\modules\region_templates\models\RegionTemplates::getVal('adres'),3)[2] . ' ' . 'ежедневно с 08.00 - 20.00'; ?></p>
                </div>
                <?php if (0) { ?>
                <div class="col-xs-6 col-sm-3 col-md-1 col-lg-1 cabinet-wrap">
                    <?php
                    // отключили
                    (Yii::$app->user->isGuest) ?
                                    Html::a(
                                            '<i class="fa fa-user" aria-hidden="true"></i> Личный кабинет',
                                            'javascript::void(0)',
                                            ['class' => 'btn btn-green',
                                                'data-target' => '#login-popup-modal',
                                                'data-toggle' => 'modal',
                                    ]) :
                                    Html::a(
                                            '<i class="fa fa-user" aria-hidden="true"></i> Личный кабинет',
                                            '/cabinet',
                                            ['class' => 'btn btn-green'])
                    ?>
                </div>
                <?php } ?>
                <div class="col-xs-6 col-sm-2 col-md-2 calc-wrap">
                    <?= Html::a('Калькулятор', '/calc', ['class' => 'btn btn-green-light']) ?>
                </div>

                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2 calc-wrap">
                    <button type="button" class="btn btn-green" 
                            data-toggle="modal" data-target="#callback-form-modal"
                            onClick="ym(53972095, 'reachGoal', 'zvonoz')">
                        <img src="/image/ico/call.png" alt="phone ico"> <span>Обратный звонок</span>

                    </button>
                </div>

                <div class="col-xs-6 col-sm-3 col-sm-offset-9 hidden-md hidden-lg bottom-phone ">
                    <?= Yii::$app->info::get('headTelephone') ?> 
                </div>
            </div>
        </div>
    </div>


    <!--<div class="middle-menu hidden-sm hidden-xs">-->
    <div class="middle-menu hidden-sm hidden-xs">
        <div class="container">

            <div class="row">

                <div class="hidden-xs hidden-sm col-md-1 col-lg-2 logo-wrap">
                    <?= $this->render('_logo') ?>
                </div>
                <div class="col-md-10 col-lg-8 menu-wrap">
                    <?php
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-left'],
                        'encodeLabels' => false,
                        'items' => Menu::getTopMenu(),
                    ]);
                    ?>
                </div>
                <div class="col-md-2 phone-wrap text-right">
                    <?= Yii::$app->info::get('headTelephone') ?>
                </div>
            </div>
        </div>
    </div>

    <!--    <div class="container">
            <div class="mobile hidden-md hidden-lg">
                <div class="row">
                    <div class="col-xs-12 logo">
    <?php if (isset($home) && $home): ?>
        <?= Html::img('/image/logo.png', ['class' => 'img img-responsive center-block', 'alt' => 'Логотип']); ?>
    <?php else: ?>
                                                                                                                                                                                                                                        <a href="/">
        <?= Html::img('/image/logo.png', ['class' => 'img img-responsive center-block', 'alt' => 'Логотип']); ?>
                                                                                                                                                                                                                                        </a>
    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>-->
</div>

<?= \app\modules\forms\widgets\CallBack::widget(['type' => 'modal']) ?>
<?= \app\modules\forms\widgets\ModalMenu::widget(); ?>
<?= app\modules\forms\widgets\Order::widget() ?>
