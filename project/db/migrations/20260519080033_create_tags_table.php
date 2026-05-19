<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTagsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $tagsTable = $this->table('tags', ['id' => false, 'primary_key' => 'id']);
        $tagsTable->addColumn('id', 'biginteger', ['identity' => true, 'signed' => true])
            ->addColumn('name', 'string', ['limit' => 255])
            ->create();

        $articleTagsTable = $this->table('article_tags', ['id' => false, 'primary_key' => 'id']);
        $articleTagsTable->addColumn('id', 'biginteger', ['identity' => true, 'signed' => true])
            ->addColumn('article_id', 'biginteger', ['signed' => true])
            ->addColumn('tag_id', 'biginteger', ['signed' => true])
            ->addForeignKey('article_id', 'articles', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('tag_id', 'tags', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();

    }
}
