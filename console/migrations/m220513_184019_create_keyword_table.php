<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%keyword}}`.
 */
class m220513_184019_create_keyword_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%keyword}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->unique()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%keyword}}');
    }
}
