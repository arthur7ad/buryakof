<?php

namespace app\modules\link_block\models;

use Yii;

/**
 * This is the model class for table "link_block".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $sys_name Системное имя
 *
 * @property LinkBlockItem[] $linkBlockItems
 */
class LinkBlock extends \app\models\LinkBlock {

    public function getLinkBlockItems() {
        return $this->hasMany(LinkBlockItem::className(), ['link_block_id' => 'id']);
    }

}
