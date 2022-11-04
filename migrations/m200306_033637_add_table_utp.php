<?php

use yii\db\Migration;

/**
 * Class m200306_033637_add_table_utp
 */
class m200306_033637_add_table_utp extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('utp', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->comment('Имя'),
            'description' => $this->string(255)->comment('Описание'),
            'order' => $this->integer(3)->comment('Порядок'),
            'is_enable' => $this->integer(1)->comment('Включено'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200306_033637_add_table_utp cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200306_033637_add_table_utp cannot be reverted.\n";

      return false;
      }
     */
}
