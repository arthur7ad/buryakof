<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tarif".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $sys_name Системное имя
 *
 * @property TarifItem[] $tarifItems
 */
class Tarif extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tarif';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sys_name'], 'required'],
            [['name', 'sys_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'sys_name' => 'Системное имя',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifItems()
    {
        return $this->hasMany(TarifItem::className(), ['tarif_id' => 'id']);
    }
}
