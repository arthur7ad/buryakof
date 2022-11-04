<?php

use yii\bootstrap\Html;
?>

<p class="icons">
<!--    <i class="fab fa-vk"></i>
    <i class="fab fa-twitter-square"></i>
    <i class="fab fa-instagram"></i>-->

    <?= Html::a(Html::img('/image/ico/foot-vk.png', ['alt' => 'vk-logo']), 'https://vk.com/burykof', ['target' => '_blank', "rel" => "nofollow"]) ?>
    <?php Html::a(Html::img('/image/ico/foot-whatsapp.png', ['alt' => 'wa-logo']), 'https://wa.me/79204645888', ['target' => '_blank', "rel" => "nofollow"]) ?>
    <?= Html::a(Html::img('/image/ico/foot-whatsapp.png', ['alt' => 'wa-logo']), 'https://wa.me/79304021021', ['target' => '_blank', "rel" => "nofollow"]) ?>
</p>
