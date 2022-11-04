<?php

use yii\db\Migration;

/**
 * Class m200325_070640_add_table_link_block
 */
class m200325_070640_add_table_link_block extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('link_block', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment("Имя"),
            'sys_name' => $this->string()->comment("Системное имя"),
        ]);

        $this->createTable('link_block_item', [
            'id' => $this->primaryKey(),
            'link_block_id' => $this->integer()->comment("Блок"),
            'name' => $this->string()->comment("Имя"),
            'url_id' => $this->string()->comment("Ссылка на страницу"),
            'icon' => $this->string()->comment("Иконка"),
        ]);

        $this->createIndex(
                'idx-link_block_item-link_block_id',
                'link_block_item',
                'link_block_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
                'fk-link_block_item-link_block_id',
                'link_block_item',
                'link_block_id',
                'link_block',
                'id',
                'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200325_070640_add_table_link_block cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200325_070640_add_table_link_block cannot be reverted.\n";

      return false;
      }
     */
}
