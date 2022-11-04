<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property int $id
 * @property int $user_id Пользователь
 * @property string $name Название
 * @property string $inn ИНН
 * @property string $ur_address Юридический адрес
 * @property string $post_address Почтовый адрес
 * @property string $phone Телефон
 * @property string $email
 *
 * @property User $user
 */
class UserProfile extends \app\models\UserProfile {
    
}
