<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%journal}}`
 */
class m220513_144100_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'theme' => $this->string(255)->notNull(),
            'authors' => $this->text()->notNull(),
            'pagesOfJournal' => $this->string(255)->notNull(),
            'file_name' => $this->string(255)->notNull(),
            'journal_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `journal_id`
        $this->createIndex(
            '{{%idx-article-journal_id}}',
            '{{%article}}',
            'journal_id'
        );

        // add foreign key for table `{{%journal}}`
        $this->addForeignKey(
            '{{%fk-article-journal_id}}',
            '{{%article}}',
            'journal_id',
            '{{%journal}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%journal}}`
        $this->dropForeignKey(
            '{{%fk-article-journal_id}}',
            '{{%article}}'
        );

        // drops index for column `journal_id`
        $this->dropIndex(
            '{{%idx-article-journal_id}}',
            '{{%article}}'
        );

        $this->dropTable('{{%article}}');
    }
}
