<?php

use yii\helpers\Html;
use kv4nt\owlcarousel\OwlCarouselWidget;
use yii\bootstrap\Tabs;
?>


<?php if ($model): ?>

    <?php

    $items = [];

    foreach ($tabs as $k => $arr):

        if ($k)
            $items [] = [
                'label' => $k,
                'content' => $this->render('_tab', ['tab' => $tabs[$k]]),
            ];
        else
            $items [] = [
                'label' => $k,
                'content' => $this->render('_tab', ['tab' => $tabs[$k]]),
                'active' => true
            ];

    endforeach;

//    print_r($tabs);
//    exit();

    echo Tabs::widget([
        'items' => $items
    ]);
    ?>

<?php endif; ?>