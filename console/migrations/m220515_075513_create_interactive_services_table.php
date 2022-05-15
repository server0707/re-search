<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%interactive_services}}`.
 */
class m220515_075513_create_interactive_services_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%interactive_services}}', [
            'id' => $this->primaryKey(),
            'fullName' => $this->string(255)->notNull(),
            'type' => $this->string()->notNull(),
            'file_name' => $this->string(255)->notNull(),
            'phone' => $this->string(255)->notNull(),
            'viewed' => $this->boolean()->defaultValue(false)->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%interactive_services}}');
    }
}
