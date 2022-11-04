<?php

use yii\db\Migration;

/**
 * Class m220516_145853_add_slider_city
 */
class m220516_145853_add_slider_city extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('slider_item_city', [
            'id' => $this->primaryKey(),
            'slider_item_id' => $this->integer()->comment("Слайд"),
            'city_id' => $this->integer()->comment("Город"),
            'top_title' => $this->text()->comment("Жёлтый заголовок"),
            'title' => $this->text()->comment("Заголовок"),
            'description' => $this->text()->comment("Описание"),
            'is_enable' => $this->integer()->comment("Включено"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220516_145853_add_slider_city cannot be reverted.\n";

        return false;
    }
    */
}
