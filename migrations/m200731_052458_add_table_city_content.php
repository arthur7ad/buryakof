<?php

use yii\db\Migration;

/**
 * Class m200731_052458_add_table_city_content
 */
class m200731_052458_add_table_city_content extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {

        $this->createTable('page_city_content', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer()->comment("Город"),
            'page_id' => $this->integer()->comment("Страница"),
            'content' => $this->text()->comment("Содержание"),
            'content_seo_1' => $this->text()->comment("SEO 1"),
            'content_seo_2' => $this->text()->comment("SEO 2"),
        ]);

        $this->createIndex(
                'idx-page_city-city_id',
                'page_city_content',
                'city_id'
        );

        $this->createIndex(
                'idx-page_city-page_id',
                'page_city_content',
                'page_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
                'fk-page_city_content-page_id',
                'page_city_content',
                'page_id',
                'page',
                'id',
                'CASCADE'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
                'fk-page_city_content-city_id',
                'page_city_content',
                'city_id',
                'city',
                'id',
                'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200731_052458_add_table_city_content cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200731_052458_add_table_city_content cannot be reverted.\n";

      return false;
      }
     */
}
