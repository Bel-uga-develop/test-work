<?php
declare(strict_types=1);

namespace Models;

use Classes\Model;

class ArticleModel extends Model
{
    public function getArticles(int $categoryID, $limit, $offset, $sort, $tags): array
    {
        $tagIds = array_filter(array_map('intval', explode(',', $tags)));
        if ($categoryID && !empty($tagIds)) {
            $query = "SELECT DISTINCT a.* FROM article_categories ac 
                JOIN articles a ON a.id = ac.article_id 
                JOIN article_tags at ON a.id = at.article_id 
                WHERE ac.category_id=" . $categoryID . " 
                AND at.tag_id IN (" . implode(',', $tagIds) . ") ";
        } else if ($categoryID && empty($tagIds)) {
            $query = "SELECT a.* FROM article_categories ac 
                JOIN articles a ON a.id = ac.article_id 
                WHERE ac.category_id=" . $categoryID . " ";
        } else if (!$categoryID && !empty($tagIds)) {
            $query = "SELECT DISTINCT a.* FROM article_tags at
                JOIN articles a ON a.id = at.article_id 
                WHERE at.tag_id IN (" . implode(',', $tagIds) . ")";
        }

        if ($sort === 'date_desc') {
            $query .= ' ORDER BY a.date DESC';
        } elseif ($sort === 'date_asc') {
            $query .= ' ORDER BY a.date ASC';
        } elseif ($sort === 'views_desc') {
            $query .= ' ORDER BY a.view_count DESC';
        } elseif ($sort === 'views_asc') {
            $query .= ' ORDER BY a.view_count ASC';
        }

        if ($limit) {
            $query .= ' LIMIT ' . (int) $limit;
        }

        if ($offset) {
            $query .= ' OFFSET ' . (int) $offset;
        }

        $this->run($query);

        $array = [];
        if ($this->result) {
            while ($row = mysqli_fetch_assoc($this->result)) {
                $array[] = $row;
            }
        }
        return $array;
    }

    public function getArticlesCount(int $categoryID): int
    {
        $query = "SELECT COUNT(*) as count FROM article_categories ac WHERE ac.category_id=" . $categoryID;
        $this->run($query);
        $row = mysqli_fetch_assoc($this->result);
        return (int) ($row['count'] ?? 0);
    }


    public function getArticle(int $articleID): array
    {
        $query = "SELECT * FROM articles WHERE id=" . $articleID;

        $this->run($query);

        $row = [];
        if ($this->result) {
            $row = mysqli_fetch_assoc($this->result);
        }

        return $row;
    }

    public function getArticleTagIds(int $articleID): array
    {
        $query = "SELECT tag_id FROM article_tags WHERE article_id = " . $articleID;
        $this->run($query);
        $tagIds = [];
        if ($this->result) {
            while ($row = mysqli_fetch_assoc($this->result)) {
                $tagIds[] = (int) $row['tag_id'];
            }
        }
        return $tagIds;
    }

}
