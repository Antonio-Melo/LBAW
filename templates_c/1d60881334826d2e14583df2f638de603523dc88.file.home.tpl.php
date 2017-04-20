<?php /* Smarty version Smarty-3.1.15, created on 2017-04-20 22:39:06
         compiled from "/opt/lbaw/lbaw1663/public_html/product/templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:43828723858f86349a676a8-72043620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d60881334826d2e14583df2f638de603523dc88' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/product/templates/home.tpl',
      1 => 1492724344,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43828723858f86349a676a8-72043620',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f86349bd6fe7_50304866',
  'variables' => 
  array (
    'onsale' => 0,
    'product' => 0,
    'mostpopular' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f86349bd6fe7_50304866')) {function content_58f86349bd6fe7_50304866($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="panel-body items-display">
	<h1>On Sale <a href="search.php"><span class="view-more">&gt;&gt;</span></a></h1>
	<hr>
	<div>
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['onsale']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
		<div class="col-md-4 col-sm-6">
			<div class="product-image-container">
				<a href=<?php echo ("product.php?id=").($_smarty_tpl->tpl_vars['product']->value['product_id']);?>
>
					<?php if ($_smarty_tpl->tpl_vars['product']->value['url']!=null) {?>
						<img src=<?php echo ("../images/products/").($_smarty_tpl->tpl_vars['product']->value['url']);?>
>
					<?php } else { ?>
						<img src="../images/products/default.png">
					<?php }?>
				</a>
			</div>
			<div class="product-info-container">
				<div class="center-block">
					<span class="name"><a href=<?php echo ("product.php?id=").($_smarty_tpl->tpl_vars['product']->value['product_id']);?>
><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a></span>
					<?php if ($_smarty_tpl->tpl_vars['product']->value['sale_price']!=null) {?>
						<span class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['sale_price'],2);?>
€</span>
						<span class="old-price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['price'],2);?>
€</span>
					<?php } else { ?>
						<span class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['price'],2);?>
€</span>
					<?php }?>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
	<h1>Most Popular <a href="search.php"><span class="view-more">&gt;&gt;</span></a></h1>
	<hr>
	<div>
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mostpopular']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
		<div class="col-md-4 col-sm-6">
			<div class="product-image-container">
				<a href=<?php echo ("product.php?id=").($_smarty_tpl->tpl_vars['product']->value['product_id']);?>
>
					<?php if ($_smarty_tpl->tpl_vars['product']->value['url']!=null) {?>
						<img src=<?php echo ("../images/products/").($_smarty_tpl->tpl_vars['product']->value['url']);?>
>
					<?php } else { ?>
						<img src="../images/products/default.png">
					<?php }?>
				</a>
			</div>
			<div class="product-info-container">
				<div class="center-block">
					<span class="name"><a href=<?php echo ("product.php?id=").($_smarty_tpl->tpl_vars['product']->value['product_id']);?>
><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a></span>
					<?php if ($_smarty_tpl->tpl_vars['product']->value['sale_price']!=null) {?>
						<span class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['sale_price'],2);?>
€</span>
						<span class="old-price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['price'],2);?>
€</span>
					<?php } else { ?>
						<span class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['price'],2);?>
€</span>
					<?php }?>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
