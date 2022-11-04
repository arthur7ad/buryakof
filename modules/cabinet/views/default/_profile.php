<?php

use yii\helpers\Html;
use kartik\editable\Editable;
use yii\helpers\Url;

$user_attr = [
    'email',
];

$profile_attr = [
    'name',
    'inn',
    'ur_address',
    'phone',
    'kpp',
    'bank',
    'director',
];
?>
<div class="profile">
    <div class="row">
        <div class="col-xs-12">

            <?php foreach ($user_attr as $atr): ?>

                <div class="form-group">
                    <?= $user->getAttributeLabel($atr) ?>
                    <?php
                    echo Editable::widget([
                        'name' => $atr,
                        'asPopover' => true,
//                    'header' => 'Province',
                        'format' => Editable::FORMAT_BUTTON,
                        'inputType' => Editable::INPUT_TEXT,
                        'value' => $user->$atr, // any list of values
                        'options' => [
                            'class' => 'form-control',
                            'prompt' => 'Select province...',
                            'pluginOptions' => [
                                'url' => Url::to(['/cabinet/admin/edit_active'])
                            ]
                        ],
                        'editableValueOptions' => ['class' => 'text-danger']
                    ]);
                    ?>

                </div>

            <?php endforeach; ?>

            <?php foreach ($profile_attr as $atr): ?>

                <div class="form-group">
                    <?= $profile->getAttributeLabel($atr) ?>
                    <?php
                    echo Editable::widget([
                        'name' => $atr,
                        'asPopover' => true,
//                    'header' => 'Province',
                        'format' => Editable::FORMAT_BUTTON,
                        'inputType' => Editable::INPUT_TEXT,
                        'value' => $profile->$atr, // any list of values
                        'options' => [
                            'class' => 'form-control',
                            'prompt' => 'Select province...',
                            'pluginOptions' => [
                                'url' => Url::to(['/cabinet/admin/edit_active'])
                            ]
                        ],
                        'editableValueOptions' => ['class' => 'text-danger']
                    ]);
                    ?>

                </div>

            <?php endforeach; ?>

            <?php
            echo Html::beginForm(['/user/default/logout'], 'post')
            . Html::submitButton(
                    'Выйти', ['class' => 'btn btn-green logout']
            )
            . Html::endForm()
            ?>

        </div>
    </div>
</div>
