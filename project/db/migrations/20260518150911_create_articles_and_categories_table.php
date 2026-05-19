<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateArticlesAndCategoriesTable extends AbstractMigration
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
        $categoryTable = $this->table('categories', ['id' => false, 'primary_key' => 'id']);
        $categoryTable->addColumn('id', 'biginteger', ['identity' => true, 'signed' => true])
            ->addColumn('name', 'string', ['limit' => 255])
            ->addColumn('description', 'text', ['null' => true])
            ->create();

        $articleTable = $this->table('articles', ['id' => false, 'primary_key' => 'id']);
        $articleTable->addColumn('id', 'biginteger', ['identity' => true, 'signed' => true])
            ->addColumn('image', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('name', 'string', ['limit' => 255])
            ->addColumn('description', 'text', ['null' => true])
            ->addColumn('text', 'text', ['null' => true])
            ->addColumn('view_count', 'integer', ['default' => 0, 'signed' => true])
            ->addColumn('date', 'date')
            ->create();

        $articleCategoriesTable = $this->table('article_categories', ['id' => false, 'primary_key' => 'id']);
        $articleCategoriesTable->addColumn('id', 'biginteger', ['identity' => true, 'signed' => true])
            ->addColumn('article_id', 'biginteger', ['signed' => true])
            ->addColumn('category_id', 'biginteger', ['signed' => true])
            ->addForeignKey('article_id', 'articles', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('category_id', 'categories', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}
