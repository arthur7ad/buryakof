<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\components\Breadcrumbs;
use app\widgets\BreadcrumbsMicrodata;
use app\assets\AppAsset;
use app\modules\region_templates\models\RegionTemplates;
use app\widgets\Alert;

$this->registerCssFile('/css/layout/default.css');
$this->registerJsFile('https://api-maps.yandex.ru/2.1/?apikey=a1255e8c-1cac-4d49-8db7-3648d0741538&lang=ru_RU', [
    'depends' => [\yii\web\JqueryAsset::className()]
]);
$this->registerJsFile('/js/contactMap.js', [
    'depends' => [\yii\web\JqueryAsset::className()]
]);


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <?= $this->render('_head', ['model' => $this]) ?>
    <body>
        <?php $this->beginBody() ?>

        <script>

            var address = false;

        </script>

        <div class="page default">
            <div class="wrap">

                <?= $this->render('_header') ?>


                <div class="container">
                    <div class="content margin-bottom">
                        <?=
                        BreadcrumbsMicrodata::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>
                        <?= Alert::widget() ?>
                        <div id="content">
                            <?= $content ?>
                        </div>
                    </div>

                </div>

                <?php if (\app\modules\region_templates\models\RegionTemplates::getVal('adres')): ?>

                    <div id="contactMap">

                    </div>

                <?php else: ?>

                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Adac34d7d271f71412af076dde4eebbbecc3a3e3a8fbb8a53a8e0e0abc4c22238&amp;width=100%&amp;height=600&amp;lang=ru_RU&amp;scroll=false"></script>

                <?php endif; ?>





                <?php echo $this->render('_reviews') ?>

                <?= $this->render('_footer') ?>

            </div>
        </div>

        <?= Yii::$app->info::get('counters'); ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
