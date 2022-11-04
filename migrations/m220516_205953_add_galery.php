<?php

use yii\db\Migration;

/**
 * Class m220516_205953_add_galery
 */
class m220516_205953_add_galery extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('galery', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("Название"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('galery');
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
