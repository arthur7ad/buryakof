<?php

use yii\db\Migration;

/**
 * Class m220516_176953_add_url_to_cases
 */
class m220516_176953_add_url_to_cases extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('cases', 'url_id', $this->integer()->comment('Url'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m220516_176953_add_url_to_cases cannot be reverted.\n";

        return false;
    }
}
