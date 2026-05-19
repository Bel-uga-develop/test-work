<?php
declare(strict_types=1);

namespace Controllers;

use Classes\Controller;
use Models\ArticleModel;

class ArticleController extends Controller
{
    public ?string $layouts = 'first_layouts';

    public function index(): void
    {
        $articleModel = new ArticleModel();
        $articleID = (int) ($_GET['article_id'] ?? 0);

        if ($articleID > 0) {
            $article = $articleModel->getArticle($articleID);
            $this->template->vars('article', $article);

            // Fetch similar articles by tags
            $tagIds = $articleModel->getArticleTagIds($articleID);
            $otherArticles = [];
            if (!empty($tagIds)) {
                $tagsString = implode(',', $tagIds);
                // Fetch up to 4 articles to filter out current one
                $fetchedArticles = $articleModel->getArticles(0, 4, 0, 'date_desc', $tagsString);
                foreach ($fetchedArticles as $fa) {
                    if ((int) $fa['id'] !== $articleID) {
                        $otherArticles[] = $fa;
                    }
                }
                $otherArticles = array_slice($otherArticles, 0, 3);
            }
            $this->template->vars('otherArticles', $otherArticles);
        }

        $this->template->view('article');
    }

}
