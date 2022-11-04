<?php

use yii\db\Migration;

/**
 * Class m220516_207953_add_galery_to_page
 */
class m220516_207953_add_galery_to_page extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('page', 'galery', $this->string(255)->comment('Кейсы'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m220516_207953_add_galery_to_page cannot be reverted.\n";

        return false;
    }
}
