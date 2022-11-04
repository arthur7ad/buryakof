<?php

use yii\db\Migration;

/**
 * Class m200707_093616_modify_table_tarif
 */
class m200707_093616_modify_table_tarif extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tarif_item', 'alt', $this->string(500)->comment('Alt'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200707_093616_modify_table_tarif cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200707_093616_modify_table_tarif cannot be reverted.\n";

        return false;
    }
    */
}
