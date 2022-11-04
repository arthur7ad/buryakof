<?php

use yii\db\Migration;

/**
 * Class m200309_135029_portfolio
 */
class m200309_135029_portfolio extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('portfolio', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->comment('Название'),
            'date' => $this->dateTime()->comment('Дата'),
            'anons' => $this->string(500)->comment('Анонс'),
            'image' => $this->string(255)->comment('Изображение'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200309_135029_portfolio cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200309_135029_portfolio cannot be reverted.\n";

      return false;
      }
     */
}
