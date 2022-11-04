<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "link_block".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $sys_name Системное имя
 * @property string $title Заголовок
 *
 * @property LinkBlockItem[] $linkBlockItems
 */
class LinkBlock extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'link_block';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['name', 'sys_name', 'title'], 'string', 'max' => 255],
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
            'title' => 'Заголовок',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinkBlockItems()
    {
        return $this->hasMany(LinkBlockItem::className(), ['link_block_id' => 'id']);
    }
}
