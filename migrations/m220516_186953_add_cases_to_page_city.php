<?php

use yii\db\Migration;

/**
 * Class m220516_186953_add_cases_to_page_city
 */
class m220516_186953_add_cases_to_page_city extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('page_city_content', 'cases', $this->string(255)->comment('Кейсы'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m220516_186953_add_cases_to_page_city cannot be reverted.\n";

        return false;
    }
}
