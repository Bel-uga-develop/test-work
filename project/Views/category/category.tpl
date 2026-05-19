<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./" class="text-decoration-none">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{$category.name}</li>
                </ol>
            </nav>
            <h1 class="text-primary">{$category.name}</h1>
            <p class="lead text-muted">{$category.description}</p>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
        <div class="text-muted">Статей в категории: {$articles|@count}</div>
        <div class="d-flex align-items-center">
            <span class="me-2 text-secondary">Сортировка:</span>
            <select id="select-sort" class="form-select form-select-sm" style="width: auto;">
                <option value="date_desc" {if $currentSort == 'date_desc'}selected{/if}>Сначала новые</option>
                <option value="date_asc" {if $currentSort == 'date_asc'}selected{/if}>Сначала старые</option>
                <option value="views_desc" {if $currentSort == 'views_desc'}selected{/if}>Популярные</option>
                <option value="views_asc" {if $currentSort == 'views_asc'}selected{/if}>Непопулярные</option>
            </select>
        </div>
    </div>

    {if $articles|@count > 0}
        <div class="row">
            {foreach $articles as $article}
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        {if $article.image}
                            <a href="./article?article_id={$article.id}">
                                <img src="{$article.image}" class="card-img-top" alt="{$article.name}" style="height: 200px; object-fit: cover;">
                            </a>
                        {/if}
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="./article?article_id={$article.id}" class="text-decoration-none text-dark hover-primary">
                                    {$article.name}
                                </a>
                            </h5>
                            <p class="card-text text-secondary">{$article.description}</p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0 d-flex justify-content-between align-items-center">
                            <small class="text-muted">Просмотров: {$article.view_count}</small>
                            <small class="text-muted">{$article.date}</small>
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>

        {if $totalPages > 1}
            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item {if $currentPage <= 1}disabled{/if}">
                        <a class="page-link" href="./category?category_id={$category.id}&sort={$currentSort}&page={$currentPage - 1}">&laquo;</a>
                    </li>
                    
                    {for $p=1 to $totalPages}
                        <li class="page-item {if $p == $currentPage}active{/if}">
                            <a class="page-link" href="./category?category_id={$category.id}&sort={$currentSort}&page={$p}">{$p}</a>
                        </li>
                    {/for}
                    
                    <li class="page-item {if $currentPage >= $totalPages}disabled{/if}">
                        <a class="page-link" href="./category?category_id={$category.id}&sort={$currentSort}&page={$currentPage + 1}">&raquo;</a>
                    </li>
                </ul>
            </nav>
        {/if}
    {else}
        <div class="alert alert-info">В этой категории пока нет статей.</div>
    {/if}
</div>
