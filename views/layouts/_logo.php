<?php

use yii\bootstrap\Html;
?>

<div class="logo-abs-wrap text-center">
    <?php if (Yii::$app->request->url == Yii::$app->homeUrl): ?>
        <?= Html::img('/image/logo.png', ['class' => 'img img-responsive', 'alt' => 'ООО «Компания Буряков»']); ?>
        <?php else: ?>
        <a href="/">
        <?= Html::img('/image/logo.png', ['class' => 'img img-responsive', 'alt' => 'ООО «Компания Буряков»']); ?>
        </a>
<?php endif; ?>
</div>