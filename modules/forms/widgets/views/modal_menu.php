<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\bootstrap\Nav;
use app\modules\menu\models\Menu;
use yii\helpers\Url;
use app\modules\city\models\City;

$this->registerCssFile('/js/menu/mmenu.css');
$this->registerJsFile('/js/menu/mmenu.js');
$this->registerJsFile('/js/menu/mmenu.polyfills.js');
$this->registerJsFile('/js/menu/init.js');
?>



<?php
Modal::begin([
    'id' => 'modal-menu',
//    'header' => '<p class="h2 text-center">Заказать звонок</p>',
//    'toggleButton' => [
//        'label' => Html::img('/image/ico/phone.png').' Заказать звонок', 'class' => 'btn-link call-back-btn'
//    ],
]);


$menu = Menu::getTopMenu();
?>



<nav id="menu">
    <ul>
        <?php foreach ($menu as $level1): ?>

            <li>
                <?php if (isset($level1['items']) && $level1['items']): ?>

                    <span><?= $level1['label'] ?></span>
                    <ul>
                        <li>
                            <?= Html::a($level1['label'], $level1['url']) ?>
                        </li>
                        <?php foreach ($level1['items'] as $level2): ?>
                            <?php // Yii::error($level2); ?>
                            <li> 
                                <?= Html::a($level2['label'], $level2['url']) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                <?php else: ?>
                    <?= Html::a($level1['label'], $level1['url']) ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>

    </ul>
</nav>



<?php
Modal::end();
?>



