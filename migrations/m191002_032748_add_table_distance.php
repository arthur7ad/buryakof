<?php

use yii\db\Migration;

/**
 * Class m191002_032748_add_table_distance
 */
class m191002_032748_add_table_distance extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('distance', [
            'id' => $this->primaryKey(),
            'from' => $this->string(255)->notNull(),
            'to' => $this->string(255)->notNull(),
            'distance' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191002_032748_add_table_distance cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191002_032748_add_table_distance cannot be reverted.\n";

        return false;
    }
    */
}
