<?php

use yii\db\Migration;

/**
 * Class m200308_145442_add_table_profile
 */
class m200308_145442_add_table_profile extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('user_profile', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->comment('Пользователь'),
            'name' => $this->string(500)->notNull()->comment('Название'),
            'inn' => $this->string(10)->notNull()->comment('ИНН'),
            'ur_address' => $this->string(500)->notNull()->comment('Юридический адрес'),
            'post_address' => $this->string(500)->notNull()->comment('Почтовый адрес'),
            'phone' => $this->string(255)->comment('Телефон'),
            'email' => $this->string(255),
        ]);

        $this->createIndex(
                'idx-user_profile-user_id',
                'user_profile',
                'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
                'fk-user_profile-user_id',
                'user_profile',
                'user_id',
                'user',
                'id',
                'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200308_145442_add_table_profile cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200308_145442_add_table_profile cannot be reverted.\n";

      return false;
      }
     */
}
