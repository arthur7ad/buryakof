<?php

use yii\db\Migration;

/**
 * Class m200316_030128_add_table_tarif
 */
class m200316_030128_add_table_tarif extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('tarif', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment("Имя"),
        ]);

        $this->createTable('tarif_item', [
            'id' => $this->primaryKey(),
            'tarif_id' => $this->integer()->comment("Тариф"),
            'name' => $this->string()->comment("Имя"),
            'price' => $this->string()->comment("Цена"),
            'text1' => $this->text()->comment("Текст 1"),
            'text2' => $this->text()->comment("Текст2"),
            'text3' => $this->text()->comment("Текст3"),
            'image' => $this->string()->comment("Изображение"),
        ]);

        $this->createIndex(
                'idx-tarif_item-tarif_id',
                'tarif_item',
                'tarif_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
                'fk-tarif-tarif_id',
                'tarif_item',
                'tarif_id',
                'tarif',
                'id',
                'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200316_030128_add_table_tarif cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200316_030128_add_table_tarif cannot be reverted.\n";

      return false;
      }
     */
}
