<?php

namespace app\modules\cabinet\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class AdminController extends \app\controllers\AdminController {

    public function actions() {
        return ArrayHelper::merge(parent::actions(), [
                    'edit_active' => [// identifier for your editable column action
                        'class' => EditableColumnAction::className(), // action class name
                        'modelClass' => State::className(), // the model for the record being edited
                        'outputValue' => function ($model, $attribute, $key, $index) {
                            return (int) $model->$attribute;      // return any custom output value if desired
                        },
                        'outputMessage' => function($model, $attribute, $key, $index) {
                            return '';                                  // any custom error to return after model save
                        },
                        'showModelErrors' => true, // show model validation errors after save
                        'errorOptions' => ['header' => '']                // error summary HTML options
                    // 'postOnly' => true,
                    // 'ajaxOnly' => true,
                    // 'findModel' => function($id, $action) {},
                    // 'checkAccess' => function($action, $model) {}
                    ]
        ]);
    }

}
