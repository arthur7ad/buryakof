<?php

namespace app\modules\link_block\models;

use Yii;
use app\modules\url\models\Url;

/**
 * This is the model class for table "link_block_item".
 *
 * @property int $id
 * @property int $link_block_id Блок
 * @property string $name Имя
 * @property string $url_id Ссылка на страницу
 * @property string $icon Иконка
 *
 * @property LinkBlock $linkBlock
 */
class LinkBlockItem extends \app\models\LinkBlockItem {

    const PATH = '/uploads/image/ico/';

    public function getUrl() {
        return $this->hasOne(Url::className(), ['id' => 'url_id']);
    }

    public function getIconFile() {
        return $this->hasOne(\noam148\imagemanager\models\ImageManager::className(), ['id' => 'icon']);
    }

    public function getImage() {

        // йобнутая функция

        if (isset($this->iconFile->fileName)) {

            return '/' . $this->iconFile->imagePathPrivate;

//            $filename_arr = explode('.', $this->iconFile->fileName);
//
//            Yii::error(self::PATH . $this->iconFile->fileHash . '.' . $filename_arr[1]);
//
//            if (is_array($filename_arr) && isset($filename_arr[1]))
//                return self::PATH . $this->iconFile->id . '_' . $this->iconFile->fileHash . '.' . $filename_arr[1];
        }

        return '';
    }

}
