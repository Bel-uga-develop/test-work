<div class="container mt-4">
    {foreach $categoriesData as $categoryItem}
        <div class="category-block mb-5">
            <div class="d-flex mb-3">
                <div class="p-2">
                    <h2 class="mb-3 text-primary">{$categoryItem.category.name}</h2>
                </div>
                <div class="ms-auto p-2">
                    <a class="link-offset-2" href="./category?category_id={$categoryItem.category.id}">View all</a> 
                </div>
            </div>
            
            <p class="text-muted">{$categoryItem.category.description}</p>
            
            <div class="row">
                {foreach $categoryItem.articles as $article}
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
        </div>
    {/foreach}
</div>
