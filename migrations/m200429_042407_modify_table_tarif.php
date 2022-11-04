<?php

use yii\db\Migration;

/**
 * Class m200429_042407_modify_table_tarif
 */
class m200429_042407_modify_table_tarif extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {

        $this->addColumn('tarif_item', 'is_akcia', $this->integer(1)->comment('Акции'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200429_042407_modify_table_tarif cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200429_042407_modify_table_tarif cannot be reverted.\n";

      return false;
      }
     */
}
