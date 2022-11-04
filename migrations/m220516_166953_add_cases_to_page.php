<?php

use yii\db\Migration;

/**
 * Class m220516_166953_add_cases_to_page
 */
class m220516_166953_add_cases_to_page extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('page', 'cases', $this->string(255)->comment('Кейсы'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m220516_146953_add_clients_to_page cannot be reverted.\n";

        return false;
    }
}
