<?php /* Smarty version Smarty-3.1.15, created on 2017-05-22 16:15:24
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/checkout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19289588985919a408880ba6-26412463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '916a82a0b9cea5eb1d074f765bd1c7c040e333f4' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/checkout.tpl',
      1 => 1495466117,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19289588985919a408880ba6-26412463',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5919a408b02973_80783285',
  'variables' => 
  array (
    'addresses' => 0,
    'address' => 0,
    'countries' => 0,
    'country' => 0,
    'products' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5919a408b02973_80783285')) {function content_5919a408b02973_80783285($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="checkout-body">
	<h1>Chekout</h1>
	
	<a href="#shippingAddress" class="list-group-item" data-toggle="collapse">
		<h4>Shipping Address</h4>
	</a>
	<div class="collapse container in" id="shippingAddress">

		<!-- My Addresses -->
		<div id="myAddresses">
			<ul class="row list-unstyled">
				<?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['address']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['addresses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value) {
$_smarty_tpl->tpl_vars['address']->_loop = true;
?>
					<li class="col-sm-6 col-md-6">
						<div class="adressCard" id=<?php echo $_smarty_tpl->tpl_vars['address']->value['address_id'];?>
>
							<div class="addressInfo">
								<p><?php echo $_smarty_tpl->tpl_vars['address']->value['street'];?>
, <?php echo $_smarty_tpl->tpl_vars['address']->value['door_number'];?>
<br>
								<?php echo $_smarty_tpl->tpl_vars['address']->value['postal_zip'];?>
 <?php echo $_smarty_tpl->tpl_vars['address']->value['city'];?>
<br>
								<?php echo $_smarty_tpl->tpl_vars['address']->value['region'];?>
<br>
								<?php echo $_smarty_tpl->tpl_vars['address']->value['country_name'];?>
<br>
								Tel: <?php echo $_smarty_tpl->tpl_vars['address']->value['telephone_number'];?>
</p>
							</div>
							<div class="addressEdit hide">
								<input type="text" class="address-edit-street" placeholder="Street" value=<?php echo $_smarty_tpl->tpl_vars['address']->value['street'];?>
></input>
								<input type="text" class="address-edit-door-number" placeholder="Door number" value=<?php echo $_smarty_tpl->tpl_vars['address']->value['door_number'];?>
></input>
								<input type="text" class="address-edit-postal-zip" placeholder="Zip code" value=<?php echo $_smarty_tpl->tpl_vars['address']->value['postal_zip'];?>
></input>
								<input type="text" class="address-edit-city" placeholder="City" value=<?php echo $_smarty_tpl->tpl_vars['address']->value['city'];?>
></input>
								<input type="text" class="address-edit-region" placeholder="Region" value=<?php echo $_smarty_tpl->tpl_vars['address']->value['region'];?>
></input>
								<select class="country-select address-edit-country">
									<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['country']->value['id'];?>
"
										<?php if ($_smarty_tpl->tpl_vars['country']->value['name']==$_smarty_tpl->tpl_vars['address']->value['country_name']) {?>
											selected
										<?php }?>
										><?php echo $_smarty_tpl->tpl_vars['country']->value['name'];?>
</option>
									<?php } ?>
								</select>
								<input type="text" class="address-edit-telephone" placeholder="Phone number" value=<?php echo $_smarty_tpl->tpl_vars['address']->value['telephone_number'];?>
></input>
							</div>
							<button type="button" class="btn btn-primary btn-block select-address"> Select </button>
							<button type="button" class="btn btn-primary btn-block edit-address"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-primary btn-block delete-address"><i class="fa fa-trash"></i></button>

							<button type="button" class="btn btn-primary btn-block save-address hide">Save</button>
							<button type="button" class="btn btn-primary btn-block cancel-address hide">Cancel</button>
						</div>
					</li>
				<?php } ?>
			</ul>

			<div id="add-address-input" class="hide">
				<div>
					<input type="text" id="address-add-street" placeholder="Street"></input>
					<input type="text" id="address-add-door-number" placeholder="Door number"></input>
					<input type="text" id="address-add-postal-zip" placeholder="Zip code"></input>
					<input type="text" id="address-add-city" placeholder="City"></input>
					<input type="text" id="address-add-region" placeholder="Region"></input>
					<select class="country-select" id="address-add-country">
						<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['country']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['country']->value['name'];?>
</option>
						<?php } ?>
					</select>
					<input type="text" id="address-add-telephone" placeholder="Phone number"}></input>
				</div>
				<button type="button" id="save-add-address" class="btn btn-primary btn-block profileButton">Save</button>
				<button type="button" id="cancel-add-address" class="btn btn-primary btn-block profileButton">Cancel</button>
			</div>

			<button id="add-address-button" type="button" class="btn btn-primary btn-block ">Add</button>
		</div>
	</div>

	<a href="#shippingMethod" class="list-group-item" data-toggle="collapse">
		<h4>Shipping Method</h4>
	</a>
	<div class="collapse container" id="shippingMethod">
		<p>Escolher modo de envio</p>
	</div>

	<a href="#paymentMethod" class="list-group-item" data-toggle="collapse">
		<h4>Payment Method</h4>
	</a>
	<div class="collapse container" id="paymentMethod">
		<p>Escolher metodo de pagamento</p>
	</div>
	
	<h4>Order Summary</h4>
	
	<div class="checkout-cart">
		<span class="checkout-subtotal">Subtotal: <span class="checkout-subtotal-value"></span></span>
	</div>
	
	<div class="items-display" id="cart-results">		
		<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
			<div class="product-list">
			
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
						<div class="list-middle-container col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
						<div class="list-right-container col-lg-2 col-md-2 col-sm-2 col-xs-12">
								<span class="quantity"> 1 </span>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
