<?php
/* Smarty version 5.8.0, created on 2026-05-19 17:07:26
  from 'file:layouts/first_layouts.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a0c98ce5e2646_38845960',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0238588ed328834d9f0e8aa1b7235660fa4c2eb' => 
    array (
      0 => 'layouts/first_layouts.tpl',
      1 => 1779210421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a0c98ce5e2646_38845960 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/Views/layouts';
?><!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Главная страница</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" media="all">
    <?php echo '<script'; ?>
 src="/js/app.js?v=1.0.1"><?php echo '</script'; ?>
>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Navbar</a>
        </div>
    </nav>
    <div class="container ">
        <?php $_smarty_tpl->renderSubTemplate($_smarty_tpl->getValue('contentPage'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    </div>
</body>

</html>
<?php }
}
