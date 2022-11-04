<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property int $id
 * @property string $question Вопрос
 * @property string $answer Ответ
 * @property int $order Порядок отображения 
 * @property int $is_enable Включено
 */
class Faq extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question', 'answer'], 'required'],
            [['question', 'answer'], 'string'],
            [['order', 'is_enable'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Вопрос',
            'answer' => 'Ответ',
            'order' => 'Порядок отображения
',
            'is_enable' => 'Включено',
        ];
    }
}
