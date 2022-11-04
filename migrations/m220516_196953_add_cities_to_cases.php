<?php

use yii\db\Migration;

/**
 * Class m220516_196953_add_cities_to_cases
 */
class m220516_196953_add_cities_to_cases extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('cases', 'cities', $this->string(255)->comment('cities'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m220516_196953_add_cities_to_cases cannot be reverted.\n";

        return false;
    }
}
