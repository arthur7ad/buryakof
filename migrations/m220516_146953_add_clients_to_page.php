<?php

use yii\db\Migration;

/**
 * Class m220516_146953_add_clients_to_page
 */
class m220516_146953_add_clients_to_page extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('page', 'has_clients', $this->integer(1)->comment('Показывать клиентов'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m220516_146953_add_clients_to_page cannot be reverted.\n";

        return false;
    }
}
