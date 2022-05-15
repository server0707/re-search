<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%editorials}}`.
 */
class m220514_110853_create_editorials_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%editorials}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'fullName' => $this->string(255)->notNull(),
            'view_number' => $this->integer()->notNull(),
            'phone' => $this->string(255),
            'email' => $this->string(255),
            'description' => $this->string(500)->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%editorials}}');
    }
}
