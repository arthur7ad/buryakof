<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Зарегистрироваться');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>


    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            
            <?= $form->field($model, 'name')->textInput() ?>
            
            <?= $form->field($model, 'inn')->textInput() ?>
            
            <?= $form->field($model, 'ur_address')->textInput() ?>
            
            <?= $form->field($model, 'post_address')->textInput() ?>            

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'passwordConfirmation')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Зарегистрироваться'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
