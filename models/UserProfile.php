<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property int $id
 * @property int $user_id Пользователь
 * @property string $name Полное юридическое название организации
 * @property string $inn ИНН
 * @property string $ur_address Юридический адрес
 * @property string $post_address Почтовый адрес
 * @property string $phone Телефон
 * @property string $kpp КПП
 * @property string $bank Банковские реквизиты
 * @property string $director Директор
 *
 * @property User $user
 */
class UserProfile extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['name', 'inn', 'ur_address', 'post_address'], 'required'],
            [['name', 'ur_address', 'post_address'], 'string', 'max' => 500],
            [['inn'], 'string', 'max' => 10],
            [['phone', 'kpp', 'bank', 'director'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'name' => 'Полное юридическое название организации',
            'inn' => 'ИНН',
            'ur_address' => 'Юридический адрес',
            'post_address' => 'Почтовый адрес',
            'phone' => 'Телефон',
            'kpp' => 'КПП',
            'bank' => 'Банковские реквизиты',
            'director' => 'Директор',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
