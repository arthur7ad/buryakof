<?php

use yii\db\Migration;

/**
 * Class m191008_052635_tarif
 */
class m191008_052635_tarif extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('tarif', [
            'id' => $this->primaryKey(),
            'from_id' => $this->integer(11)->notNull()->comment('Город отправки'),
            'to_id' => $this->integer(11)->notNull()->comment('Город назначения'),
            't2_otdelno' => $this->integer(11)->comment('Газель до 2т отдельно'),
            't2_dogruz' => $this->integer(11)->comment('Газель до 2т догруз'),
            't5_otdelno' => $this->integer(11)->comment('5т отдельно'),
            't5_dogruz' => $this->integer(11)->comment('5т догруз'),
            't10_otdelno' => $this->integer(11)->comment('10т отдельно'),
            't10_dogruz' => $this->integer(11)->comment('10т догруз'),
            't20_otdelno' => $this->integer(11)->comment('20т отдельно'),
            't20_dogruz' => $this->integer(11)->comment('20т догруз'),
            'trall_otdelno' => $this->integer(11)->comment('Тралл отдельно'),
            'trall_dogruz' => $this->integer(11)->comment('Тралл догруз'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m191008_052635_tarif cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m191008_052635_tarif cannot be reverted.\n";

      return false;
      }
     */
}
