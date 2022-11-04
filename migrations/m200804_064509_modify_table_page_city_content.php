<?php

use yii\db\Migration;

/**
 * Class m200804_064509_modify_table_page_city_content
 */
class m200804_064509_modify_table_page_city_content extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('page_city_content', 'header', $this->string(1000)->comment('Заголовок'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200804_064509_modify_table_page_city_content cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200804_064509_modify_table_page_city_content cannot be reverted.\n";

      return false;
      }
     */
}
