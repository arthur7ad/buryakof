<?php

use yii\db\Migration;

/**
 * Class m201126_033205_modify_table_regin_templates
 */
class m201126_033205_modify_table_regin_templates extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('region_templates', 'url', $this->string(500)->comment('Url'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m201126_033205_modify_table_regin_templates cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m201126_033205_modify_table_regin_templates cannot be reverted.\n";

      return false;
      }
     */
}
