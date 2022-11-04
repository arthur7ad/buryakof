<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;

//$this->registerJsFile('@web/js/forms.js', ['depends' => ['app\assets\AppAsset']]);
?>

<?php
Modal::begin([
    'id' => 'thanks-modal',
    'header' => '',
//    'toggleButton' => [
//        'label' => Html::img('/image/ico/phone.png').' Заказать звонок', 'class' => 'btn-link call-back-btn'
//    ],
]);
?>

<div class="row">

    <div class="col-xs-2">
        <?= Html::img('/image/galka.png', ['class' => 'img img-responsive', 'alt' => 'Галка']) ?>
    </div>
    <div class="col-xs-10 text">
        Наш специалист свяжется <br/>
        с вами в ближайшее время!
    </div>

</div>
<?php
Modal::end();
?>



