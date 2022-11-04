<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = '404 - страница не найдена';
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
   

    <p>
        Извините, такой страницы больше не существует. Вы можете перейти на <a href="/">Главную</a>
    </p>

</div>
