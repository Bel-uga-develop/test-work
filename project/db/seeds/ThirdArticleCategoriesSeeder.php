<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class ThirdArticleCategoriesSeeder extends AbstractSeed
{
    /**
     * Run Method.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'article_id' => 1,
                'category_id' => 1
            ],
            [
                'id' => 2,
                'article_id' => 2,
                'category_id' => 2
            ],
            [
                'id' => 3,
                'article_id' => 3,
                'category_id' => 3
            ],
            // Article 4 is linked to both Shirts (1) and Pants (2)
            [
                'id' => 4,
                'article_id' => 4,
                'category_id' => 3
            ],
        ];

        $this->execute('DELETE FROM article_categories WHERE id IN (1, 2, 3, 4, 5)');
        $this->table('article_categories')->insert($data)->saveData();
        $data = [
            [
                'id' => 1,
                'article_id' => 1,
                'tag_id' => 1
            ],
            [
                'id' => 2,
                'article_id' => 2,
                'tag_id' => 2
            ],
            [
                'id' => 3,
                'article_id' => 3,
                'tag_id' => 3
            ],
        ];

        $this->execute('DELETE FROM article_tags WHERE id IN (1, 2, 3)');
        $this->table('article_tags')->insert($data)->saveData();
    }
}
