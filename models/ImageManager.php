<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ImageManager".
 *
 * @property int $id
 * @property string $fileName
 * @property string $fileHash
 * @property string $created
 * @property string $modified
 * @property int $createdBy
 * @property int $modifiedBy
 */
class ImageManager extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ImageManager';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fileName', 'fileHash', 'created'], 'required'],
            [['created', 'modified'], 'safe'],
            [['createdBy', 'modifiedBy'], 'integer'],
            [['fileName'], 'string', 'max' => 128],
            [['fileHash'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fileName' => 'File Name',
            'fileHash' => 'File Hash',
            'created' => 'Created',
            'modified' => 'Modified',
            'createdBy' => 'Created By',
            'modifiedBy' => 'Modified By',
        ];
    }
}
