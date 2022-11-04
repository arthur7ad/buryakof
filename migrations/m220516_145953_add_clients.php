<?php

use yii\db\Migration;

/**
 * Class m220516_145953_add_clients
 */
class m220516_145953_add_clients extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('clients', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("Название"),
            'image' => $this->string(255)->comment("Изображение"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('clients');
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
