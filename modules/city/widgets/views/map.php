<?php
$arr = [];

foreach ($model as $item)
    $arr[] = ['lat' => $item->latitude, 'long' => $item->longitude, 'name' => $item->name];
?>

<div class="ya-map-wrap">

    <div id="ya-map">
    </div>
</div>


<script type="text/javascript">

    var City = {
        List: [],
    };
    City.List = <?= json_encode($arr); ?>

</script>
