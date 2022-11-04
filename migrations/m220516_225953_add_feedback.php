<?php

use yii\db\Migration;

/**
 * Class m220516_225953_add_feedback
 */
class m220516_225953_add_feedback extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('feedback', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("Название"),
        ]);

        $this->createTable('feedback_item', [
            'id' => $this->primaryKey(),
            'feedback_id' => $this->integer(),
            'name' => $this->string(255)->comment("Название"),
            'text' => $this->string(255)->comment("Текст"),
            'youtube' => $this->string(255)->comment("Ютуб"),
            'image' => $this->string(255)->comment("Изображение"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('feedback');
        $this->dropTable('feedback_item');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220516_145853_add_slider_city cannot be reverted.\n";

        return false;
    }
    */
}
