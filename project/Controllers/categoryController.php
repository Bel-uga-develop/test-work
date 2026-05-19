<?php
declare(strict_types=1);

namespace Controllers;

use Classes\Controller;
use Models\CategoryModel;
use Models\ArticleModel;

class CategoryController extends Controller
{
    public ?string $layouts = 'first_layouts';

    public function index(): void
    {
        $categoryModel = new CategoryModel();
        $articleModel = new ArticleModel();

        $categoryID = (int) ($_GET['category_id'] ?? 0);

        if ($categoryID > 0) {
            $category = $categoryModel->getCategory($categoryID);


            $page = (int) ($_GET['page'] ?? 1);
            if ($page < 1) {
                $page = 1;
            }
            $limit = 3;
            $offset = ($page - 1) * $limit;

            $sort = (string) ($_GET['sort'] ?? 'date_desc');
            $allowedSorts = ['date_desc', 'date_asc', 'views_desc', 'views_asc'];
            if (!in_array($sort, $allowedSorts, true)) {
                $sort = 'date_desc';
            }

            $articles = $articleModel->getArticles($categoryID, $limit, $offset, $sort, '');
            $totalArticles = $articleModel->getArticlesCount($categoryID);
            $totalPages = (int) ceil($totalArticles / $limit);

            $this->template->vars('category', $category);
            $this->template->vars('articles', $articles);
            $this->template->vars('currentPage', $page);
            $this->template->vars('totalPages', $totalPages);
            $this->template->vars('currentSort', $sort);

            $this->template->view('category');
        }
    }

}
