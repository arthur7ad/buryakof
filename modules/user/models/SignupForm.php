<?php

namespace app\modules\user\models;

use app\modules\user\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends UserProfile {

    public $username;
    public $email;
    public $password;
    public $passwordConfirmation;

    /**
     * @inheritdoc
     */
    public function rules() {

        return [
            [['name', 'inn', 'ur_address', 'post_address'], 'required'],
            [['name', 'ur_address', 'post_address'], 'string', 'max' => 500],
            [['inn'], 'string', 'max' => 10],
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'app\modules\user\models\User', 'message' => Yii::t('app', 'Такой логин уже используется')],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'app\modules\user\models\User', 'message' => Yii::t('app', 'Такой email уже используется')],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['passwordConfirmation', 'required'],
            ['passwordConfirmation', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match", 'on' => 'validate'],
        ];
    }

    public function attributeLabels() {

        $labels = parent::attributeLabels();

        $labels = $labels + [
            'username' => Yii::t('app', 'Логин'),
            'email' => Yii::t('app', 'E-Mail'),
            'password' => Yii::t('app', 'Пароль'),
            'passwordConfirmation' => Yii::t('app', 'Подтверждение пароля')
        ];

        return $labels;
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {

        if (!$this->validate()) {

            Yii::error($this->errors);
//            exit();

            return null;
        } else {
            $account = new User();
            $account->username = $this->username;
            $account->email = $this->email;
            $account->setPassword($this->password);
            $account->auth_key = $account->generateAuthKey();

            if ($account->save()) {

                $profile = new UserProfile();
                $profile->setAttributes($this->attributes, false);
                $profile->user_id = $account->id;

//                Yii::error($profile->errors);
//                exit();

                if ($profile->save())
                    ;
                else {
                    Yii::error($profile->errors);
//                    exit;
                }

                return $account;
            } else {
                print_r($account->errors);
//                exit();
            }
        }
    }

}
