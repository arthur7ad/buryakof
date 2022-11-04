<?php

use yii\db\Migration;

/**
 * Class m201214_061918_modify_table_page
 */
class m201214_061918_modify_table_page extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('page', 'subdomain', $this->string(50)->comment('Поддомен'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m201214_061918_modify_table_page cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m201214_061918_modify_table_page cannot be reverted.\n";

      return false;
      }
     */
}
