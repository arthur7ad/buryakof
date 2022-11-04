<?php

use yii\db\Migration;

/**
 * Class m220516_155953_add_cases
 */
class m220516_155953_add_cases extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cases', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("Название"),
            'image' => $this->string(255)->comment("Изображение"),
            'description' => $this->text()->comment("Название"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cases');
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
