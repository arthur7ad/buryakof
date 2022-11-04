<?php

namespace app\modules\slider\models;

use Yii;

/**
 * This is the model class for table "slide_page".
 *
 * @property int $id
 * @property int $slide_id Слайд
 * @property int $page_id Страница
 *
 * @property Page $page
 * @property SliderItem $slide
 */
class SlidePage extends \app\models\SlidePage {
    
}
