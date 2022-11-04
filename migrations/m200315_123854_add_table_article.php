<?php

use yii\db\Migration;

/**
 * Class m200315_123854_add_table_article
 */
class m200315_123854_add_table_article extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'created_at' => $this->date()->comment('Дата создания'),
            'header' => $this->string(1000)->comment("Заголовок")->notNull(),
            'content' => $this->text()->comment("Содержание"),
            'url_id' => $this->integer()->comment("Url"),
        ]);

        $this->createIndex(
                'idx-page-url_id', 'page', 'url_id'
        );

        $this->addForeignKey(
                'fk-page_id_url', 'page', 'url_id', 'url', 'id', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200315_123854_add_table_article cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200315_123854_add_table_article cannot be reverted.\n";

      return false;
      }
     */
}
