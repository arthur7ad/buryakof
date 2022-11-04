<?php

use yii\db\Migration;

/**
 * Class m191105_020338_table_page
 */
class m191105_020338_table_page extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('page', [
            'id' => $this->primaryKey(),
            'created_at' => $this->dateTime()->comment('Дата создания'),
            'header' => $this->string(1000)->comment("Заголовок")->notNull(),
            'content' => $this->text()->comment("Содержание"),
            'url_id' => $this->integer()->comment("Url"),
            'parent_id' => $this->integer()->comment("Родитель"),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m191105_020338_table_page cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m191105_020338_table_page cannot be reverted.\n";

      return false;
      }
     */
}
