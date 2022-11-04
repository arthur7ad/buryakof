<?php

use yii\db\Migration;

/**
 * Class m200422_051649_add_table_slidepage
 */
class m200422_051649_add_table_slidepage extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('slide_page', [
            'id' => $this->primaryKey(),
            'slide_id' => $this->integer()->comment("Слайд"),
            'page_id' => $this->integer()->comment("Страница"),
        ]);

        $this->createIndex(
                'idx-user_slide_page_slide',
                'slide_page',
                'slide_id'
        );

        $this->createIndex(
                'idx-user_slide_page_page',
                'slide_page',
                'page_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
                'fk-page-page_id',
                'slide_page',
                'page_id',
                'page',
                'id',
                'CASCADE'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
                'fk-slide_item-slide_id',
                'slide_page',
                'slide_id',
                'slider_item',
                'id',
                'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200422_051649_add_table_slidepage cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200422_051649_add_table_slidepage cannot be reverted.\n";

      return false;
      }
     */
}
