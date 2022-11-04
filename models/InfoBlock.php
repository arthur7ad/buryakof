<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "info_block".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $label Системное имя
 * @property string $value Значение
 * @property int $created_at
 * @property int $updated_at
 */
class InfoBlock extends \app\models\CustomAR {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name', 'label'], 'required'],
            [['value'], 'string'],
            [['name', 'label'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'label' => 'Системное имя',
            'value' => 'Значение',
        ];
    }

}
