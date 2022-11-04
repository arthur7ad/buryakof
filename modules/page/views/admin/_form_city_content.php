<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use yii\helpers\Url;
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="btn-group" role="group" aria-label="Basic example">

        <?php
        foreach ($model->city_content as $k => $item)
            echo Html::a($item->city->name, [Url::base(), 'id' => $model->id,  'city_id' => $k], ['class' => 'btn btn-primary'])
            ?>


    </div>

    <?php
    $items = [];

//    Yii::error($model->city_content);



    foreach ($model->city_content as $k => $item):

//        echo $k;
//        echo $city_id;
//    Yii::error($city_id);

        if ($k != $city_id)
            continue;

//        Yii::error($item);

        $text = $form->field($item, 'title[' . $k . ']')->textInput([
            'value' => $item->title,
                ]
        );

        $text .= $form->field($item, 'description[' . $k . ']')->textInput([
            'value' => $item->description,
                ]
        );

        $text .= $form->field($item, 'header[' . $k . ']')->textInput([
            'value' => $item->header,
                ]
        );

        $text .= $form->field($item, 'cases')
            ->dropDownList(\app\modules\cases\models\Cases::getCases(),
                [
                        'option' => $item->cases,
                    'multiple' => 'multiple',
                    'class' => 'chosen-select input-md required',
                ]
            )->label('Кейсы для показа');


        $text .= $this->render('@app/views/section/vRedactorCity', [
//            'model' => $model->city_content[$k],
            'model' => $item,
            'form' => $form,
            'name' => 'content[' . $k . ']',
            'data' => $item->content,
        ]);

        $text .= $this->render('@app/views/section/vRedactorCity', [
            'model' => $item,
            'form' => $form,
            'name' => 'content_seo_1[' . $k . ']',
            'data' => $item->content_seo_1,
        ]);

        $text .= $this->render('@app/views/section/vRedactorCity', [
            'model' => $item,
            'form' => $form,
            'name' => 'content_seo_2[' . $k . ']',
            'data' => $item->content_seo_2,
        ]);

        $items[] = [
            'label' => $item->city->name,
            'content' => $text,
            'active' => ($k == 1) ? true : false,
        ];

    endforeach;

    echo $text;

//    echo Tabs::widget([
//        'items' => $items,
//    ]);
    ?>
    <div class="form-group">
<?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>


<?php ActiveForm::end(); ?>
</div>
