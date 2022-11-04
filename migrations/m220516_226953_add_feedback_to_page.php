<?php

use yii\db\Migration;

/**
 * Class m220516_226953_add_feedback_to_page
 */
class m220516_226953_add_feedback_to_page extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('page', 'feedback', $this->string(255)->comment('Группа отзывов'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m220516_226953_add_feedback_to_page cannot be reverted.\n";

        return false;
    }
}
