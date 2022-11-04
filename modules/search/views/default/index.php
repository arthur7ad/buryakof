
<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\modules\contacts\models\Contacts;
use yii\widgets\LinkPager;

$this->params['breadcrumbs'][] = $this->title;
?>


<div class="search-result-wrap">

    <h1>Поиск по сайту</h1>

    <?= $this->render('_form') ?>

    <?php if (isset($result)): ?>

        <h2>Результаты поиска: <span class="text-info"><?= $query ?></span></h2>

        <?php foreach ($result as $name => $url): ?>

            <?= Html::a($name, $url) ?>
            <hr/>

        <?php endforeach; ?>

    <?php endif; ?>

</div>
