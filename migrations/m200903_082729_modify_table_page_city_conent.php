<?php

use yii\db\Migration;

/**
 * Class m200903_082729_modify_table_page_city_conent
 */
class m200903_082729_modify_table_page_city_conent extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('page_city_content', 'title', $this->string(500));
        $this->addColumn('page_city_content', 'description', $this->string(500));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200903_082729_modify_table_page_city_conent cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200903_082729_modify_table_page_city_conent cannot be reverted.\n";

      return false;
      }
     */
}
