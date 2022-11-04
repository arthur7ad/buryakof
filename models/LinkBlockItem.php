<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "link_block_item".
 *
 * @property int $id
 * @property int $link_block_id Блок
 * @property string $name Имя
 * @property string $url_id Ссылка на страницу
 * @property string $icon Иконка
 * @property int $order Порядок
 *
 * @property LinkBlock $linkBlock
 */
class LinkBlockItem extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'link_block_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['link_block_id', 'order'], 'integer'],
            [['name', 'url_id', 'icon'], 'string', 'max' => 255],
            [['link_block_id'], 'exist', 'skipOnError' => true, 'targetClass' => LinkBlock::className(), 'targetAttribute' => ['link_block_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link_block_id' => 'Блок',
            'name' => 'Имя',
            'url_id' => 'Ссылка на страницу',
            'icon' => 'Иконка',
            'order' => 'Порядок',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinkBlock()
    {
        return $this->hasOne(LinkBlock::className(), ['id' => 'link_block_id']);
    }
}
