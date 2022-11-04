<?php

use yii\db\Migration;

/**
 * Class m200409_093120_modify_table_slider_item
 */
class m200409_093120_modify_table_slider_item extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->alterColumn('slider_item', 'description', $this->string(255)->comment('Описание'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200409_093120_modify_table_slider_item cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200409_093120_modify_table_slider_item cannot be reverted.\n";

      return false;
      }
     */
}
