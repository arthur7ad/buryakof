<?php

use yii\db\Migration;

/**
 * Class m200219_100102_modify_table_autopark
 */
class m200219_100102_modify_table_autopark extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('autopark', 'volume', $this->integer()->comment('Объём'));
        $this->addColumn('autopark', 'carrying', $this->float()->comment('Грузоподъёмность'));
        $this->addColumn('autopark', 'price', $this->integer()->comment('Цена'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200219_100102_modify_table_autopark cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200219_100102_modify_table_autopark cannot be reverted.\n";

      return false;
      }
     */
}
