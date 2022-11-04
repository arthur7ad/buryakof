<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use Swift_Attachment;

/**
 * ContactForm is the model behind the contact form.
 */
class BlanketOrder extends EmailForm {

    public $name;
    public $phone;
    public $type;
    public $comment;
    public $fileDoc;
    public $attache;
    public $subject = 'Заказ услуги';

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['name', 'phone'], 'required'],
            [['comment', 'fileDoc'], 'safe'],
            [['fileDoc'], 'file'],
            ['phone', 'match', 'pattern' => '/\+[0-9] \([0-9]{3}\) [0-9]{3}-[0-9]{4}$/', 'message' => ' Неверно введён телефон'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
            'phone' => 'Ваш телефон',
            'comment' => 'Ваш комментарий',
        ];
    }

    public function contact() {
        if ($this->validate()) {

            Yii::error($this->attache);
            if ($this->attache)
            Yii::$app->mailer->compose()
                    ->setTo($this->recipient)
                    ->setFrom([$this->sender_email => $this->sender_name])
                    ->setSubject($this->subject. ' — ' . Yii::$app->city->currentName)
                    ->setTextBody($this->body . PHP_EOL . PHP_EOL . 'Город: ' . Yii::$app->city->currentName)
                    ->attach($this->attache)
                    ->send();
            else
                Yii::$app->mailer->compose()
                        ->setTo($this->recipient)
                        ->setFrom([$this->sender_email => $this->sender_name])
                        ->setSubject($this->subject. ' — ' . Yii::$app->city->currentName)
                        ->setTextBody($this->body . PHP_EOL . PHP_EOL . 'Город: ' . Yii::$app->city->currentName)
                        ->send();

            return true;
        } else {
            Yii::error($this->errors);
            return false;
        }
    }

    public function upload() {
        if ($this->validate()) {
            
            Yii::error($this->attache);

//            print_r($this->file);
//            exit();
            $this->attache = 'upload_form/' . $this->fileDoc->baseName . '.' . $this->fileDoc->extension;
            $this->fileDoc->saveAs($this->attache);

            return true;
        } else {
            return false;
        }
    }

}
