<?php
//$this->registerJsFile('https://maps.api.2gis.ru/2.0/loader.js?pkg=full');
$this->registerJsFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=478bdf92-6afb-49c9-8e25-55a1119b4239', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('/js/test.js', ['position' => \yii\web\View::POS_END]);
?>

<div id="map" style="width: 100%; height: 500px">

</div>

