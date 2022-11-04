<?php

use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\modules\menu\models\Menu;
use yii\helpers\ArrayHelper;
use app\modules\region_templates\models\RegionTemplates;
use app\modules\city\models\City;
use yii\bootstrap\Modal;

$this->registerJsFile('https://api-maps.yandex.ru/2.1/?apikey=a1255e8c-1cac-4d49-8db7-3648d0741538&lang=ru_RU', [
    'depends' => [\yii\web\JqueryAsset::className()]
]);
$this->registerJsFile('/js/contactMap.js', [
    'depends' => [\yii\web\JqueryAsset::className()]
]);

$menu = [
    ['label' => 'Услуги', 'url' => '#usl'],
    ['label' => 'Тарифы', 'url' => '#tar'],
    ['label' => 'Преимущества', 'url' => '#advantages'],
    ['label' => 'Калькулятор', 'url' => '#calc'],
    ['label' => 'Отзывы', 'url' => '#rev'],
    ['label' => 'Контакты', 'url' => '#con'],
];
?>

<div class="mobile-menu hidden-md hidden-lg">
    <div class="container">
        <div class="row">
            <div class="col-xs-9 phone-wrap">
                <?= Yii::$app->info::get('headTelephone') ?> 
            </div>   
            <div class="col-xs-3 text-right">
                <?php
                echo Html::a(
                        Html::img('/image/humburger_green.png', ['alt' => 'Выпадающее меню']),
                        'javascript:void(0);'
//                        '#menu'
                        , [
                    'data-toggle' => "modal",
                    'data-target' => "#modal-menu",
                ]);
                ?>
            </div>
            <div class="col-xs-8 col-sm-4">

                <button type="button" class="btn btn-green" 
                        data-toggle="modal" data-target="#callback-form-modal"
                        onClick="ym(53972095, 'reachGoal', 'zvonoz')">
                    <img src="/image/ico/call.png" alt="phone ico"> <span>Заказать звонок</span>

                </button>
                
            </div>   
            <div class="col-xs-6 text-right">

            </div>   


            <div class="col-xs-12">
                <?= $this->render('../_logo') ?>
            </div>   
        </div>   
    </div>
</div>

<div class="hidden-xs hidden-sm header <?php if (isset($slider) && $slider) echo 'slider-on'; ?>">

    <div class="container">
        <div class="desktop">
            <div class="row line-wrap">
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-4">
                    <div class="hidden-md hidden-lg">
                        <?= $this->render('../_logo') ?>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 ">

                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2 city-wrap">
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
                <div class="col-xs-6 col-sm-2 col-md-2 calc-wrap">
                    <?= Html::a('Калькулятор', '#calc', ['class' => 'btn btn-green-light']) ?>
                </div>

                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2 calc-wrap">
                    <button type="button" class="btn btn-green" 
                            data-toggle="modal" data-target="#callback-form-modal"
                            onClick="ym(53972095, 'reachGoal', 'zvonoz')">
                        <img src="/image/ico/call.png" alt="phone ico"> <span>Заказать звонок</span>

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
                    <?= $this->render('../_logo') ?>
                </div>
                <div class="col-md-10 col-lg-8 menu-wrap">
                    <?php
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-left'],
                        'encodeLabels' => false,
                        'items' => $menu,
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
<?php // \app\modules\forms\widgets\ModalMenu::widget(); ?>
<?= app\modules\forms\widgets\Order::widget() ?>

<?php
Modal::begin([
    'id' => 'modal-menu',
//    'header' => '<p class="h3 text-center">Меню</p>',
//    'toggleButton' => [
//        'label' => Html::img('/image/ico/phone.png').' Заказать звонок', 'class' => 'btn-link call-back-btn'
//    ],
]);
?>

<div class="city-choose-wrap">
    <?php
    echo 'Город: ' . Html::a(
            '' .
            City::getCityNameByCode(Yii::$app->city->current_city), 'javascript:void(0);', [
        'class' => "city-choise-link",
        'data-toggle' => "modal",
        'data-tooltip' => "tooltip",
        'data-target' => "#city-modal",
        'data-placement' => "bottom",
        'title' => Yii::$app->city->title,
    ]);
    ?>
    <p><?php echo explode(' ',\app\modules\region_templates\models\RegionTemplates::getVal('adres'),3)[2] . ' ' . 'ежедневно с 08.00 - 20.00'; ?></p>
</div>


<ul class="list-unstyled">


    <?php foreach ($menu as $item): ?>

        <li><?=
            Html::a($item['label'], $item['url'], [
                'onClick' => 'HideModal();'
            ])
            ?></li>

    <?php endforeach; ?>

</ul>

<?php Modal::end(); ?>
