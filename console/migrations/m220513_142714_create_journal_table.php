<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%journal}}`.
 */
class m220513_142714_create_journal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%journal}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'pages_count' => $this->integer(),
            'published' => $this->date()->notNull(),
            'file_name' => $this->string(255),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%journal}}');
    }
}
