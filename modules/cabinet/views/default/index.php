<?php

use yii\bootstrap\Tabs;

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('/css/profile.css');
?>

<div class="h1 header-line"><?= $this->title ?></div>

<div class="profile-wrap">

    <?php
    echo Tabs::widget([
        'items' => [
            [
                'label' => 'Личные данные',
                'content' => $this->render('_profile', [
                    'user' => $user,
                    'profile' => $user->userProfile,
                ]),
                'active' => true
            ],
            [
                'label' => 'Активные заявки',
                'content' => $this->render('_1', [
                    'user' => $user,
                    'profile' => $user->userProfile,
                ]),
            ],
            [
                'label' => 'Завершённые заявки',
                'content' => $this->render('_2', [
                    'user' => $user,
                    'profile' => $user->userProfile,
                ]),
            ],
            [
                'label' => 'Документы',
                'content' => $this->render('_3', [
                    'user' => $user,
                    'profile' => $user->userProfile,
                ]),
            ],
        ],
    ]);
    ?>

</div>