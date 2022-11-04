<?php

use yii\db\Migration;

/**
 * Class m201216_065635_modify_table_regtempl
 */
class m201216_065635_modify_table_regtempl extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('region_templates', 'domain', $this->string(100)->comment('Домен'));
        $this->addColumn('region_templates', 'ad', $this->string(100)->comment('Рекламная компания'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m201216_065635_modify_table_regtempl cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m201216_065635_modify_table_regtempl cannot be reverted.\n";

      return false;
      }
     */
}
