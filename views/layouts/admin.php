<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\widgets\BreadcrumbsMicrodata;
use app\assets\AdminAsset;
use app\models\Info;
use app\widgets\Alert;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => '',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse  navbar-fixed-top',
                ],
                'innerContainerOptions' => [
                    'class' => 'container-fluid',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => [
                    ['label' => 'Страницы', 'url' => ['/page/admin/index']],
                    ['label' => 'Лэндинги', 'url' => ['/page/admin/subdomain']],
                    ['label' => 'Тарифы', 'url' => ['/tarif/admin/index/']],
                    ['label' => 'Пользователи', 'url' => ['/user/admin/index/']],
                    ['label' => 'SEO', 'url' => ['/city/admin/index'], 'items' => [
                            ['label' => 'Города', 'url' => ['/city/admin/index']],
                            ['label' => 'Метки', 'url' => ['/shortcode/admin/index']],
                            ['label' => 'Значения', 'url' => ['/region_templates/admin/index']],
                            ['label' => 'Robots.txt', 'url' => ['/robots/admin/index']],
                            ['label' => 'Url', 'url' => ['/url/admin/index']],
                        ]],
                    ['label' => 'Контент', 'items' => [
                            ['label'=> 'Модули', 'items' => [
                                    ['label' => 'Наши клиенты', 'url' => '/clients/admin/index'],
                                    ['label' => 'Наши кейсы', 'url' => '/cases/admin/index'],
                                    ['label' => 'Наши галереи', 'url' => '/galery/admin/index'],
                                    ['label' => 'Наши отзывы', 'url' => '/feedback/admin/index']
                            ]],
                            ['label' => 'Автопарк', 'url' => ['/autopark/admin/index']],
                            ['label' => 'Тарифы', 'url' => ['/tarif/admin/index']],
                            ['label' => 'Группы ссылок', 'url' => ['/link_block/admin/index']],
                            ['label' => 'Отзывы', 'url' => ['/review/admin/index']],
                            ['label' => 'Статьи', 'url' => ['/article/admin/index']],
                            ['label' => 'Меню', 'url' => ['/menu/admin/index']],
                            ['label' => 'Слайдер', 'url' => ['/slider/admin/index']],
                            ['label' => 'ИнфоБлоки', 'url' => ['/info/admin/index']],
                            ['label' => 'FAQ', 'url' => ['/faq/admin/index']],
                            ['label' => 'УТП', 'url' => ['/utp/admin/index']],
                            ['label' => 'Портфолио', 'url' => ['/portfolio/admin/index']],
                        ]],
                    ['label' => 'Пароль администратора', 'url' => ['/user/admin/update/', 'id' => 1]],
                    Yii::$app->user->isGuest ? (
                            ['label' => 'Login', 'url' => ['/auth/default/login']]
                            ) : (
                            '<li>'
                            . Html::beginForm(['/user/default/logout'], 'post')
                            . Html::submitButton(
                                    'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>'
                            )
                ],
            ]);
            NavBar::end();
            ?>

            <div class="container-fluid">
                <div class="col-xs-12">
                    <?= Alert::widget() ?>
                    <?=
                    BreadcrumbsMicrodata::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
                    <?= $content ?>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
