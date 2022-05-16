<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%journal}}`.
 */
class m220516_112438_add_description_column_to_journal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%journal}}', 'description', $this->string(500));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%journal}}', 'description');
    }
}
