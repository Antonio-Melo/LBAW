<?php /* Smarty version Smarty-3.1.15, created on 2017-05-04 08:51:42
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/favorites.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134423211058fa79efda5532-85933901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '602e7b7d6e0c368ee9e8b2608dbb2f7b799a067f' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/favorites.tpl',
      1 => 1493884143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134423211058fa79efda5532-85933901',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58fa79eff2cc91_15466906',
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa79eff2cc91_15466906')) {function content_58fa79eff2cc91_15466906($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="favorites-body">
	<h1>Favorites</h1>
	<hr>
	
	<div class="items-display" id="cart-results">
		<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
			<div class="product-list" id=<?php echo $_smarty_tpl->tpl_vars['product']->value['product_id'];?>
>
				<button type="button" class="btn remove-favorites-item">
					<span class="glyphicon glyphicon-remove"></span>
				</button>
			
				<div class="product-image-container">
					<a href=<?php echo ("product.php?id=").($_smarty_tpl->tpl_vars['product']->value['product_id']);?>
>
						<?php if ($_smarty_tpl->tpl_vars['product']->value['url']!=null) {?>
							<img src=<?php echo ("../images/products/").($_smarty_tpl->tpl_vars['product']->value['url']);?>
 alt=<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
>
						<?php } else { ?>
							<img src="../images/products/common/default.png" alt=<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
>
						<?php }?>
					</a>
				</div>
				
				<div class="product-info-container">
					<div class="row">						
						<div class="list-left-container col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="name"><a href=<?php echo ("product.php?id=").($_smarty_tpl->tpl_vars['product']->value['product_id']);?>
><?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
</a></div>
							<div class="type-brand"><a><?php echo $_smarty_tpl->tpl_vars['product']->value['keyword_name'];?>
</a> - <a><?php echo $_smarty_tpl->tpl_vars['product']->value['brand_name'];?>
</a></div>
						</div>
						<div class="list-middle-container col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<?php if ($_smarty_tpl->tpl_vars['product']->value['stock']>0) {?>
								<div class="available"><span class="glyphicon glyphicon-ok"></span>&nbsp; Available</div>
							<?php } else { ?>
								<div class="unavailable"><span class="glyphicon glyphicon-remove"></span>&nbsp; Unavailable</div>
							<?php }?>
							<div class="rating1">
								<?php if ($_smarty_tpl->tpl_vars['product']->value['nr_ratings']!=0) {?>
									<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['product']->value['rating']/$_smarty_tpl->tpl_vars['product']->value['nr_ratings']+1 - (1) : 1-($_smarty_tpl->tpl_vars['product']->value['rating']/$_smarty_tpl->tpl_vars['product']->value['nr_ratings'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
										<img src="../images/products/common/star.png" alt=<?php echo $_smarty_tpl->tpl_vars['product']->value['rating']/$_smarty_tpl->tpl_vars['product']->value['nr_ratings'];?>
>
									<?php }} ?>
								<?php }?>
							</div>					
						</div>
						<div class="list-right-container col-lg-4 col-md-4 col-sm-4 col-xs-12">			
							<?php if ($_smarty_tpl->tpl_vars['product']->value['sale_price']!=null) {?>
								<span class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['sale_price'],2);?>
&euro;</span>
								<span class="old-price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['price'],2);?>
&euro;</span>
							<?php } else { ?>
								<span class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['price'],2);?>
&euro;</span>
							<?php }?>
							<button class="btn btn-default product-cart-bttn">
								<span class="glyphicon glyphicon-shopping-cart"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>	
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
