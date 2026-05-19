<?php
declare(strict_types=1);

namespace Controllers;

use Classes\Controller;
use Models\CategoryModel;
use Models\ArticleModel;

class IndexController extends Controller
{
    public ?string $layouts = 'first_layouts';

    public function index(): void
    {
        $categoryModel = new CategoryModel();
        $articleModel = new ArticleModel();

        $categories = $categoryModel->getCategoriesWithArticles();
        $categoriesData = [];
        foreach ($categories as $category) {
            $latestArticles = $articleModel->getArticles((int) $category['id'], 3, 0, 'date_desc', '');
            $categoriesData[] = [
                'category' => $category,
                'articles' => $latestArticles
            ];
        }

        $this->template->vars('categoriesData', $categoriesData);
        $this->template->view('index');
    }

}
