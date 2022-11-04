<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tarif_old".
 *
 * @property int $id
 * @property int $from_id Город отправки
 * @property int $to_id Город назначения
 * @property int $t2_otdelno Газель до 2т отдельно
 * @property int $t2_dogruz Газель до 2т догруз
 * @property int $t5_otdelno 5т отдельно
 * @property int $t5_dogruz 5т догруз
 * @property int $t10_otdelno 10т отдельно
 * @property int $t10_dogruz 10т догруз
 * @property int $t20_otdelno 20т отдельно
 * @property int $t20_dogruz 20т догруз
 * @property int $trall_otdelno Тралл отдельно
 * @property int $trall_dogruz Тралл догруз
 */
class TarifOld extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tarif_old';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_id', 'to_id'], 'required'],
            [['from_id', 'to_id', 't2_otdelno', 't2_dogruz', 't5_otdelno', 't5_dogruz', 't10_otdelno', 't10_dogruz', 't20_otdelno', 't20_dogruz', 'trall_otdelno', 'trall_dogruz'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_id' => 'Город отправки',
            'to_id' => 'Город назначения',
            't2_otdelno' => 'Газель до 2т отдельно',
            't2_dogruz' => 'Газель до 2т догруз',
            't5_otdelno' => '5т отдельно',
            't5_dogruz' => '5т догруз',
            't10_otdelno' => '10т отдельно',
            't10_dogruz' => '10т догруз',
            't20_otdelno' => '20т отдельно',
            't20_dogruz' => '20т догруз',
            'trall_otdelno' => 'Тралл отдельно',
            'trall_dogruz' => 'Тралл догруз',
        ];
    }
}
