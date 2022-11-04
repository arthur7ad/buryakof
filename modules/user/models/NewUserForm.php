<?php

namespace app\modules\user\models;

use app\modules\user\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class NewUserForm extends Model {

    const ADMIN_ROLE = 1;

    public $username;
    public $email;
    public $password;
    public $passwordConfirmation;
    public $fio;
    public $phone;
    public $date_start;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['username', 'trim'],
            [['username', 'email', 'password', 'passwordConfirmation'], 'required'],
            ['username', 'unique', 'targetClass' => 'app\modules\user\models\User', 'message' => Yii::t('app', 'ERROR_LOGIN')],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'app\modules\user\models\User', 'message' => Yii::t('app', 'ERROR_EMAIL')],
            ['password', 'string', 'min' => 6],
            ['passwordConfirmation', 'string', 'min' => 6],
        ];
    }

    public function attributeLabels() {
        return [
            'username' => Yii::t('app', 'SIGNUP_LOGIN'),
            'email' => Yii::t('app', 'SIGNUP_EMAIL'),
            'password' => Yii::t('app', 'SIGNUP_PASSWORD'),
            'passwordConfirmation' => Yii::t('app', 'SIGNUP_PASSWORD_CONFIRMATION'),
            'fio' => 'ФИО',
            'date_start' => 'Дата приёма на работу',
            'phone' => 'Телефон',
            'role' => 'Группа пользователей',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function save() {

        if (!$this->validate()) {
            return null;
        }

        $account = new User();
        if ($this->password == $this->passwordConfirmation) {
            $account->username = $this->username;
            $account->email = $this->email;
            $account->setPassword($this->password);
            $account->auth_key = $account->generateAuthKey();
            $account->role = self::ADMIN_ROLE;
//
            if ($account->save()) {
//                $worker = new \app\models\Worker;
//                $worker->fio = $this->fio;
//                $worker->phone = $this->phone;
//                $worker->email = $this->email;
//                $worker->date_start = $this->date_start;
//                $worker->user_id = $account->id;
//                $worker->save();


                return true;
            }
        } else {
            return false;
        }
    }

}
