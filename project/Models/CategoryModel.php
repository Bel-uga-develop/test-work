<?php

declare(strict_types=1);

namespace Models;

use Classes\Model;

class CategoryModel extends Model
{
    public function getCategories(): array
    {
        $query = "SELECT * FROM categories";
        $this->run($query);
        $array = [];
        if ($this->result) {
            while ($row = mysqli_fetch_assoc($this->result)) {
                $array[] = $row;
            }
        }
        return $array;
    }

    public function getCategoriesWithArticles(): array
    {
        $query = "SELECT DISTINCT c.* FROM categories c JOIN article_categories ac ON c.id = ac.category_id";
        $this->run($query);
        $array = [];
        if ($this->result) {
            while ($row = mysqli_fetch_assoc($this->result)) {
                $array[] = $row;
            }
        }
        return $array;
    }

    public function getCategory(int $id): ?array
    {
        $query = "SELECT * FROM categories WHERE id=" . $id;
        $this->run($query);
        if ($this->result) {
            return mysqli_fetch_assoc($this->result) ?: null;
        }
        return null;
    }
}
