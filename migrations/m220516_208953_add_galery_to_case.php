<?php

use yii\db\Migration;

/**
 * Class m220516_208953_add_galery_to_case
 */
class m220516_208953_add_galery_to_case extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('cases', 'galery', $this->string(255)->comment('Галерея'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m220516_208953_add_galery_to_case cannot be reverted.\n";

        return false;
    }
}
