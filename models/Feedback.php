<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $image Изображение
 */
class Feedback extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название группы отзывов',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(FeedbackItem::className(), ['feedback_id' => 'id']);
    }
}
