<?php

use yii\db\Migration;

/**
 * Class m220516_206953_add_galery_item
 */
class m220516_206953_add_galery_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('galery_item', [
            'id' => $this->primaryKey(),
            'galery_id' => $this->integer(),
            'name' => $this->string(255)->comment("Название"),
            'image' => $this->string(255)->comment("Название"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('galery_item');
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
