<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class FirstCategorySeeder extends AbstractSeed
{
    /**
     * Run Method.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Рубашки',
                'description' => 'Рубашки мужские'
            ],
            [
                'id' => 2,
                'name' => 'Брюки',
                'description' => 'Брюки мужские'
            ],
            [
                'id' => 3,
                'name' => 'Обувь',
                'description' => 'Обувь мужская'
            ]
        ];

        $this->execute('DELETE FROM categories WHERE id IN (1, 2, 3)');
        $this->table('categories')->insert($data)->saveData();
    }
}
