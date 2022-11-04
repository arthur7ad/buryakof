<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\widgets\MaskedInput;

$this->registerJsFile('/js/calcObject.js', ['position' => \yii\web\View::POS_HEAD]);

$cityModel = Yii::$app->city->model;

$lat = $cityModel->latitude;
$long = $cityModel->longitude;
?>

<script type="text/javascript">

    Calc.lat = <?= $lat ?>;
    Calc.long = <?= $long ?>;

</script>

<div class="calc">


    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#gruz" aria-controls="gruz" role="tab" data-toggle="tab" 
                                                  onClick="$('.tabs-wrap').css('background-color', $(this).css('background-color'))"
                                                  >Грузоперевозки</a></li>
        <li role="presentation"><a href="#perev" aria-controls="perev" role="tab" data-toggle="tab" 
                                   onClick="$('.tabs-wrap').css('background-color', $(this).css('background-color'))"
                                   >Переезды</a></li>
        <li role="presentation"><a href="#gruzch" aria-controls="gruzch" role="tab" data-toggle="tab"  
                                   onClick="$('.tabs-wrap').css('background-color', $(this).css('background-color'))"
                                   >Грузчики</a></li>
    </ul>

    <div class="tab-content">


        <div role="tabpanel" class="tab-pane active" id="gruz">

            <?php echo $this->render('_gruz', ['model' => $gruz]) ?>

        </div>
        <div role="tabpanel" class="tab-pane" id="perev">
            <?php echo $this->render('_pereezd', ['model' => $pereezd]) ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="gruzch">
            <?php echo $this->render('_gruzchik', ['model' => $gruzchik]) ?>
        </div>
    </div>

    <div class="tabs-wrap">

    </div>

    <!-- Tab panes -->









</div>


<?php




