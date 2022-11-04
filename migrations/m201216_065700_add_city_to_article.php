<?php

use yii\db\Migration;

/**
 * Class m201216_065700_add_city_to_article
 */
class m201216_065700_add_city_to_article extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('article', 'city', $this->string(255)->comment('Города'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m201216_065700_add_city_to_article cannot be reverted.\n";
        return false;
    }
}
