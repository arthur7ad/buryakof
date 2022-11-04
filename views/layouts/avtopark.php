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

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <?= $this->render('_head', ['model' => $this]) ?>
</head>
<body>
    <?php $this->beginBody() ?>

    <div class="page">
        <div class="wrap">

            <?= $this->render('_header', ['slider' => true]) ?>

            <?= app\modules\slider\widgets\MainSlider::widget(['system_name' => 'avtopark']) ?>

            <div class="container bottom-padding">
                <div class="content">
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


                <?php
                Yii::error(Yii::$app->request->url);
                switch (Yii::$app->request->url):

                    case '/avtopark/gazeli':

                        echo \app\modules\autopark\widgets\ParkList::widget(['type' => 1]);

                        break;

                    case '/avtopark/fury':

                        echo \app\modules\autopark\widgets\ParkList::widget(['type' => 2]);

                        break;

                    case '/avtopark/refrizheratory':

                        echo \app\modules\autopark\widgets\ParkList::widget(['type' => 3]);

                        break;

                    default:

                        echo \app\modules\autopark\widgets\ParkList::widget();

                endswitch;
                ?>

                <?php if (isset($this->content_seo_1) && $this->content_seo_1): ?>

                    <div class="seo-text">
                        <div class="container">
                            <?= $this->content_seo_1 ?>
                        </div>
                    </div>

                <?php endif; ?>

                <div class="why-info">
                    <?= \app\modules\info\models\Info::get('avtopark_info') ?>
                </div>

                <?php echo $this->render('_reviews') ?>
            </div>

            <?= $this->render('_footer', ['marginTop' => true]) ?>

        </div>
    </div>

    <?= Yii::$app->info::get('counters'); ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
