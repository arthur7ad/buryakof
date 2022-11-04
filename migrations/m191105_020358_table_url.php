<?php

use yii\db\Migration;

/**
 * Class m191105_020358_table_url
 */
class m191105_020358_table_url extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        

        $this->createTable('url', [
            'id' => $this->primaryKey(),
            'title' => $this->string(500)->notNull(),
            'description' => $this->string(500),
            'keywords' => $this->string(500),
            'url' => $this->string(500)->notNull(),
        ]);

        $this->createIndex(
                'idx-url_id', 'url', 'id'
        );

        $this->addForeignKey(
                'fk-url_id_url', 'page', 'url_id', 'url', 'id', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m191105_020358_table_url cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m191105_020358_table_url cannot be reverted.\n";

      return false;
      }
     */
}
