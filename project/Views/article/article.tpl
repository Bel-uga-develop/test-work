<div class="container mt-4">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./" class="text-decoration-none">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">{$article.name}</li>
        </ol>
    </nav>

    <!-- Main Article Content -->
    <article class="mb-5">
        <header class="mb-4">
            <h1 class="fw-bold text-primary mb-3">{$article.name}</h1>
            <div class="text-muted mb-3 d-flex align-items-center">
                <span class="me-3">Дата: {$article.date}</span>
                <span>Просмотров: {$article.view_count}</span>
            </div>
            <p class="lead text-secondary font-italic">{$article.description}</p>
        </header>

        {if $article.image}
            <div class="mb-4 text-center">
                <img src="{$article.image}" class="img-fluid rounded shadow-sm" alt="{$article.name}" style="max-height: 500px; width: 100%; object-fit: cover;">
            </div>
        {/if}

        <div class="article-text" style="font-size: 1.1rem; line-height: 1.8; white-space: pre-line;">
            {$article.text}
        </div>
    </article>

    <!-- Similar Articles Block -->
    {if $otherArticles|@count > 0}
        <div class="similar-articles-section border-top pt-5">
            <h3 class="mb-4 text-dark">Похожие статьи</h3>
            <div class="row">
                {foreach $otherArticles as $similar}
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            {if $similar.image}
                                <a href="./article?article_id={$similar.id}">
                                    <img src="{$similar.image}" class="card-img-top" alt="{$similar.name}" style="height: 200px; object-fit: cover;">
                                </a>
                            {/if}
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="./article?article_id={$similar.id}" class="text-decoration-none text-dark">
                                        {$similar.name}
                                    </a>
                                </h5>
                                <p class="card-text text-secondary">{$similar.description}</p>
                            </div>
                            <div class="card-footer bg-transparent border-top-0 d-flex justify-content-between align-items-center">
                                <small class="text-muted">Просмотров: {$similar.view_count}</small>
                                <small class="text-muted">{$similar.date}</small>
                            </div>
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>
    {/if}
</div>
