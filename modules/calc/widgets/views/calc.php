<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\widgets\MaskedInput;

$this->registerJsFile('/js/calc/Calc.js', ['position' => \yii\web\View::POS_HEAD]);

$cityModel = Yii::$app->city->model;

$lat = $cityModel->latitude;
$long = $cityModel->longitude;
?>

<script type="text/javascript">

    pCalc.lat = gCalc.lat = <?= $lat ?>;
    pCalc.long = gCalc.long = <?= $long ?>;


</script>

<div class="calc">


    <!-- Nav tabs -->
    <ul class="nav" role="tablist">
        <li role="presentation" class="active">
            <a href="#gruz">Грузоперевозки</a></li>
        <li role="presentation">
            <a href="#perev">Переезды</a></li>
        <li role="presentation">
            <a href="#gruzchik">Грузчики</a></li>
    </ul>



        <div id="gruz">
            <?php echo $this->render('_gruz', ['model' => $gruz]) ?>
        </div>
        <div id="perev">
            <?php echo $this->render('_pereezd', ['model' => $pereezd]) ?>
        </div>
        <div id="gruzchik">
            <?php echo $this->render('_gruzchik', ['model' => $gruzchik]) ?>
        </div>

</div>


<?php




