<?php /* Smarty version Smarty-3.1.15, created on 2017-05-04 08:42:42
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155513661158fa972543f4b7-82856310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9c0a9719fa88d04f04b27b476f9a104310eccbf' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/cart.tpl',
      1 => 1493883531,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155513661158fa972543f4b7-82856310',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58fa97256761c2_25816477',
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa97256761c2_25816477')) {function content_58fa97256761c2_25816477($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="cart-body">
	<h1>Shopping cart</h1>
	<hr>
	
	<?php if (count($_smarty_tpl->tpl_vars['products']->value)>0) {?>
		<div class="checkout-cart">
			<span class="checkout-subtotal">Subtotal: <span class="checkout-subtotal-value"></span></span>
			<button type="button" class="btn checkout-button ">Checkout</button>
		</div>
	<?php } else { ?>
		<span class="glyphicon glyphicon-shopping-cart"></span>
		<p>Your shopping cart is empty right now, but it doesn't have to be!</p>
		<div class="checkout-cart">
			<button type="button" class="button">Go Shopping</button>
		</div>
	<?php }?>
	
	<div class="items-display" id="cart-results">		
		<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
			<div class="product-list">
				<button type="button" class="btn remove-cart-item" id=<?php echo $_smarty_tpl->tpl_vars['product']->value['product_id'];?>
>
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
							<?php if ($_smarty_tpl->tpl_vars['product']->value['stock']>0) {?>
								<div class="available"><span class="glyphicon glyphicon-ok"></span>&nbsp; Available</div>
							<?php } else { ?>
								<div class="unavailable"><span class="glyphicon glyphicon-remove"></span>&nbsp; Unavailable</div>
							<?php }?>
							<div class="rating">
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
						<div class="list-middle-container col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<?php if ($_smarty_tpl->tpl_vars['product']->value['sale_price']!=null) {?>
								<span class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['sale_price'],2);?>
&euro;</span>
								<span class="old-price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['price'],2);?>
&euro;</span>
							<?php } else { ?>
								<span class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['price'],2);?>
&euro;</span>
							<?php }?>
						</div>
						<div class="list-right-container col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
								<span class="glyphicon glyphicon-minus"></span>
							</button>
							<input type="text" name="quantity" class="form-control input-number" value="1" min="1" max="60" readonly>
							<button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
								<span class="glyphicon glyphicon-plus"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	
	<?php if (count($_smarty_tpl->tpl_vars['products']->value)>=3) {?>
		<div class="checkout-cart">
			<span class="checkout-subtotal">Subtotal: <span class="checkout-subtotal-value"></span></span>
			<button type="button" class="btn checkout-button ">Checkout</button>
		</div>
	<?php }?>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
