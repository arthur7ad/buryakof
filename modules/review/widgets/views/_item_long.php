<?php

use yii\helpers\Html;

?>

<div class="review-wrap">
    <div class="row">
        <div class="col-xs-12 col-sm-3">
            <?php
            if ($model->avatar)
                echo Html::img($model->ava, ['class' => 'img img-responsive', 'alt' => 'Аватар'])
                ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <div class="review-item">
                <div class="name">
                    <p class="h3"><?= $model->name ?></p>
                    <span class="date pull-right">
                        <?= Yii::$app->formatter->asDate($model->date, 'short') ?>
                    </span>
                </div>
                <div class="comment">
                    <?= $model->content ?>

                    <div class="d-readmore">Phasellus eu leo rhoncus, cursus erat id, volutpat nisl. Proin sed laoreet felis. Aenean sollicitudin dictum augue, non scelerisque nulla cursus vitae. Mauris molestie, tellus sed vehicula ultricies, ex arcu semper nibh, eu malesuada turpis metus a orci. Pellentesque consequat, tortor sit amet hendrerit ornare, mi erat ultricies eros, placerat auctor lacus erat a tortor. Nullam suscipit velit libero. In facilisis eros nibh, vitae rhoncus nisl fringilla at. Aliquam auctor posuere dolor, eu dignissim augue efficitur non. Aliquam eu aliquam mi, vel malesuada justo. Praesent dictum, arcu eu convallis accumsan, neque turpis convallis elit, nec lacinia neque tortor id mauris. Fusce in augue at mi lobortis accumsan sit amet id tortor. Quisque placerat justo id neque dictum, vel auctor risus rutrum. Nam tincidunt ultricies urna ut pellentesque. Maecenas a molestie lorem. Aliquam vitae tincidunt odio.</div>
                    <span class="d-readmore_btn"></span>

                </div>
            </div>
            <div class="link">
                <?php
                if ($model->image)
                    Html::a('Благодарственное письмо', $model->img, ['target' => '_blank'])
                    ?>
            </div>
        </div>
    </div>

</div>
</div>