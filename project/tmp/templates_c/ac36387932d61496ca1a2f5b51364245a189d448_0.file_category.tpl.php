<?php
/* Smarty version 5.8.0, created on 2026-05-19 17:07:26
  from 'file:category/category.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a0c98ce7d20d6_19891600',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac36387932d61496ca1a2f5b51364245a189d448' => 
    array (
      0 => 'category/category.tpl',
      1 => 1779210244,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a0c98ce7d20d6_19891600 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/Views/category';
?><div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./" class="text-decoration-none">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $_smarty_tpl->getValue('category')['name'];?>
</li>
                </ol>
            </nav>
            <h1 class="text-primary"><?php echo $_smarty_tpl->getValue('category')['name'];?>
</h1>
            <p class="lead text-muted"><?php echo $_smarty_tpl->getValue('category')['description'];?>
</p>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
        <div class="text-muted">Статей в категории: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('articles'));?>
</div>
        <div class="d-flex align-items-center">
            <span class="me-2 text-secondary">Сортировка:</span>
            <select id="select-sort" class="form-select form-select-sm" style="width: auto;">
                <option value="date_desc" <?php if ($_smarty_tpl->getValue('currentSort') == 'date_desc') {?>selected<?php }?>>Сначала новые</option>
                <option value="date_asc" <?php if ($_smarty_tpl->getValue('currentSort') == 'date_asc') {?>selected<?php }?>>Сначала старые</option>
                <option value="views_desc" <?php if ($_smarty_tpl->getValue('currentSort') == 'views_desc') {?>selected<?php }?>>Популярные</option>
                <option value="views_asc" <?php if ($_smarty_tpl->getValue('currentSort') == 'views_asc') {?>selected<?php }?>>Непопулярные</option>
            </select>
        </div>
    </div>

    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('articles')) > 0) {?>
        <div class="row">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('articles'), 'article');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('article')->value) {
$foreach0DoElse = false;
?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <?php if ($_smarty_tpl->getValue('article')['image']) {?>
                            <a href="./article?article_id=<?php echo $_smarty_tpl->getValue('article')['id'];?>
">
                                <img src="<?php echo $_smarty_tpl->getValue('article')['image'];?>
" class="card-img-top" alt="<?php echo $_smarty_tpl->getValue('article')['name'];?>
" style="height: 200px; object-fit: cover;">
                            </a>
                        <?php }?>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="./article?article_id=<?php echo $_smarty_tpl->getValue('article')['id'];?>
" class="text-decoration-none text-dark hover-primary">
                                    <?php echo $_smarty_tpl->getValue('article')['name'];?>

                                </a>
                            </h5>
                            <p class="card-text text-secondary"><?php echo $_smarty_tpl->getValue('article')['description'];?>
</p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0 d-flex justify-content-between align-items-center">
                            <small class="text-muted">Просмотров: <?php echo $_smarty_tpl->getValue('article')['view_count'];?>
</small>
                            <small class="text-muted"><?php echo $_smarty_tpl->getValue('article')['date'];?>
</small>
                        </div>
                    </div>
                </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>

        <?php if ($_smarty_tpl->getValue('totalPages') > 1) {?>
            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php if ($_smarty_tpl->getValue('currentPage') <= 1) {?>disabled<?php }?>">
                        <a class="page-link" href="./category?category_id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
&sort=<?php echo $_smarty_tpl->getValue('currentSort');?>
&page=<?php echo $_smarty_tpl->getValue('currentPage')-1;?>
">&laquo;</a>
                    </li>
                    
                    <?php
$_smarty_tpl->assign('p', null);$_smarty_tpl->tpl_vars['p']->step = 1;$_smarty_tpl->tpl_vars['p']->total = (int) ceil(($_smarty_tpl->tpl_vars['p']->step > 0 ? $_smarty_tpl->getValue('totalPages')+1 - (1) : 1-($_smarty_tpl->getValue('totalPages'))+1)/abs($_smarty_tpl->tpl_vars['p']->step));
if ($_smarty_tpl->tpl_vars['p']->total > 0) {
for ($_smarty_tpl->tpl_vars['p']->value = 1, $_smarty_tpl->tpl_vars['p']->iteration = 1;$_smarty_tpl->tpl_vars['p']->iteration <= $_smarty_tpl->tpl_vars['p']->total;$_smarty_tpl->tpl_vars['p']->value += $_smarty_tpl->tpl_vars['p']->step, $_smarty_tpl->tpl_vars['p']->iteration++) {
$_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->iteration === 1;$_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration === $_smarty_tpl->tpl_vars['p']->total;?>
                        <li class="page-item <?php if ($_smarty_tpl->getValue('p') == $_smarty_tpl->getValue('currentPage')) {?>active<?php }?>">
                            <a class="page-link" href="./category?category_id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
&sort=<?php echo $_smarty_tpl->getValue('currentSort');?>
&page=<?php echo $_smarty_tpl->getValue('p');?>
"><?php echo $_smarty_tpl->getValue('p');?>
</a>
                        </li>
                    <?php }
}
?>
                    
                    <li class="page-item <?php if ($_smarty_tpl->getValue('currentPage') >= $_smarty_tpl->getValue('totalPages')) {?>disabled<?php }?>">
                        <a class="page-link" href="./category?category_id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
&sort=<?php echo $_smarty_tpl->getValue('currentSort');?>
&page=<?php echo $_smarty_tpl->getValue('currentPage')+1;?>
">&raquo;</a>
                    </li>
                </ul>
            </nav>
        <?php }?>
    <?php } else { ?>
        <div class="alert alert-info">В этой категории пока нет статей.</div>
    <?php }?>
</div>
<?php }
}
