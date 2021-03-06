<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 22:51:58
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52854277758fb6c39422f85-64457197%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cf74b0803b015d7c6988005cfc9553203680537' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/profile.tpl',
      1 => 1496094665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52854277758fb6c39422f85-64457197',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58fb6c395b7e35_50423530',
  'variables' => 
  array (
    'user' => 0,
    'countries' => 0,
    'country' => 0,
    'addresses' => 0,
    'address' => 0,
    'orders' => 0,
    'order' => 0,
    'product' => 0,
    'total_price' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fb6c395b7e35_50423530')) {function content_58fb6c395b7e35_50423530($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="profile-body">
    <!-- Profile -->
	<h1>Your profile</h1>
	<hr>
	<div class="profile-content">
		<ul class="nav nav-pills">
			<li class="active">
				<a data-toggle="pill" href="#accountInfo">
					<h2> <i class="fa fa-address-card-o" ></i>&nbsp; Account Info</h2>
				</a>
			</li>
			<li>
				<a data-toggle="pill" href="#security">
					<h2> <i class="fa fa-lock" ></i>&nbsp; Security</h2>
				</a>
			</li>
			
			<?php if (!isset($_SESSION['admin'])) {?>
				<li>
					<a data-toggle="pill" href="#myAddresses">
						<h2> <i class="fa fa-map-marker" ></i>&nbsp; My Addresses</h2>
					</a>
				</li>
				<li>
					<a data-toggle="pill" href="#myOrders">
						<h2> <i class="fa fa-list-alt" ></i>&nbsp; My Orders</h2>
					</a>
				</li>
			<?php }?>
		</ul>
	
		<div class="tab-content">
			<!-- Account Info -->
			<div id="accountInfo" class="tab-pane in active">
				<div class="param">
					<div class="param-name">
						<b><label for="edit-avatar">Avatar:</label></b>
					</div>
					<div class="avatar-image-container">
						<?php if ($_smarty_tpl->tpl_vars['user']->value['url']!=null) {?>
							<img class="media-object" src=<?php echo ("../images/users/").($_smarty_tpl->tpl_vars['user']->value['url']);?>
 alt=<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
>
						<?php } elseif (!isset($_SESSION['admin'])) {?>
							<img class="media-object" src="../images/users/common/default_client.png" alt=<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
>
						<?php } else { ?>
							<img class="media-object answer-pic" src="../images/users/common/default_admin.png" alt=<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
>
						<?php }?>
						
						<label id="edit-avatar-label" for="edit-avatar" class="btn hide">Upload</label>
						<input type="file" id="edit-avatar" class="hide" name="edit-avatar" accept="image/*">
					</div>
					<div style="clear: both"></div>
				</div>
				<div class="param">
					<div class="param-name">
						<b><label for="edit-username">Username: *</label></b>
					</div>
					<div class="param-content">
						<p id="info-username"><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</p>
						<div class="edit-input">
							<input type="text" id="edit-username" class="hide" name="edit-username" value=<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
 required></input>
							<div class="error-sign hide">!</div>
							<div class="error-message hide">
								Can't already be in use.<br>
								Must be a combination of letters and numbers.<br>
								Must have between 4 and 24 characters.
							</div>
						</div>
					</div>
					<div style="clear: both"></div>
				</div>
				<div class="param">
					<div class="param-name">
						<b><label for="edit-name">Name: *</label></b>
					</div>
					<div class="param-content">
						<p id="info-name"><?php echo $_smarty_tpl->tpl_vars['user']->value['users_name'];?>
</p>
						<div class="edit-input">
							<input type="text" id="edit-name" class="hide" name="edit-name" value=<?php echo $_smarty_tpl->tpl_vars['user']->value['users_name'];?>
 required></input>
							<div class="error-sign hide">!</div>
							<div class="error-message hide">
								Must have between 1 and 50 characters.
							</div>
						</div>
					</div>
					<div style="clear: both"></div>
				</div>
				<div class="param">
					<div class="param-name">
						<b><label for="edit-email">Email address: *</label></b>
					</div>
					<div class="param-content">
						<p id="info-email"><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</p>
						<div class="edit-input">
							<input type="text" id="edit-email" class="hide" name="edit-email" value=<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
 required></input>
							<div class="error-sign hide">!</div>
							<div class="error-message hide">
								Can't already be in use.<br>
								Must be a valid email address.<br>
								Can't have more than 128 characters.
							</div>
						</div>
					</div>
					<div style="clear: both"></div>
				</div>
				<div class="param">
					<div class="param-name">
						<b><label for="edit-country">Country: *</label></b>
					</div>
					<div class="param-content">
						<p id="info-country"><?php echo $_smarty_tpl->tpl_vars['user']->value['country_name'];?>
</p>
						<select name="edit-country" id="edit-country" class="hide country-select" required>
							<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['country']->value['id'];?>
"
								<?php if ($_smarty_tpl->tpl_vars['country']->value['name']==$_smarty_tpl->tpl_vars['user']->value['country_name']) {?>
									selected
								<?php }?>
								><?php echo $_smarty_tpl->tpl_vars['country']->value['name'];?>
</option>
							<?php } ?>
						</select>
					</div>
					<div style="clear: both"></div>
				</div>
				
				<div class="param">
					<div class="param-name"></div>
					<div class="param-content">
						<span class="authentication-error hide" id="edit-error"></span>
						<button id="edit-info" type="button" class="btn btn-primary btn-block profileButton">Edit</button>
						<button id="save-info" type="button" class="btn btn-primary btn-block profileButton hide">Save</button>
						<button id="cancel-info" type="button" class="btn btn-primary btn-block profileButton hide">Cancel</button>
					</div>
					<div style="clear: both"></div>
				</div>
			</div>

			<!-- Security -->
			<div id="security" class="tab-pane">
				<form method="post" action="../actions/editpassword.php">
					<div class="param">
						<div class="param-name">
							<b><label for="oldpwd">Password:</label></b>
						</div>
						<div class="param-content">
							<div class="form-group">
								<input type="password" class="form-control" name="oldpwd" id="oldpwd" placeholder="Old Password">
							</div>
						</div>
						<div style="clear: both"></div>
					</div>
					<div class="param">
						<div class="param-name"></div>
						<div class="param-content">
							<div class="form-group edit-input">
								<input type="password" class="form-control" name="pwd" id="pwd" placeholder="New Password">
								<div class="error-sign hide">!</div>
								<div class="error-message hide">
									Passwords must match.<br>
									Must have between 6 and 128 characters.
								</div>
							</div>
						</div>
						<div style="clear: both"></div>
					</div>
					<div class="param">
						<div class="param-name"></div>
						<div class="param-content">
							<div class="form-group">
								<input type="password" class="form-control" name="newpwd" id="newpwd" placeholder="Confirm New Password">
							</div>
						</div>
						<div style="clear: both"></div>
					</div>
					<div class="param">
						<div class="param-name"></div>
						<div class="param-content">
							<span class="authentication-error" id="edit-password-error"></span>
							<button id="edit-password" type="submit" class="btn btn-primary btn-block profileButton">Save</button>
						</div>
						<div style="clear: both"></div>
					</div>
				</form>
			</div>
			
			<?php if (!isset($_SESSION['admin'])) {?>
				<!-- My Addresses -->
				<div id="myAddresses" class="tab-pane">
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
									<button type="button" class="btn btn-primary btn-block profileButton edit-address"><i class="fa fa-pencil"></i></button>
									<button type="button" class="btn btn-primary btn-block profileButton delete-address"><i class="fa fa-trash"></i></button>
									
									<button type="button" class="btn btn-primary btn-block profileButton save-address hide">Save</button>
									<button type="button" class="btn btn-primary btn-block profileButton cancel-address hide">Cancel</button>
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
					
					<button id="add-address-button" type="button" class="btn btn-primary btn-block profileButton">Add</button>
				</div>

				<!-- My Orders -->
				<div id="myOrders" class="tab-pane">
					<div class="list-group panel" id="orders">
						<!--ORDER-->
						<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
							<a href=<?php echo ('#').($_smarty_tpl->tpl_vars['order']->value['reference']);?>
 class="list-group-item" data-toggle="collapse">
								Reference: <?php echo $_smarty_tpl->tpl_vars['order']->value['reference'];?>

								<i class="fa fa-caret-down"></i>
							</a>
							<div class="collapse order" id=<?php echo $_smarty_tpl->tpl_vars['order']->value['reference'];?>
>
								<!--TRACKING-->
								<div class="tracking">
									<div class="row">
										<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" align="center">
											<i class="fa fa-check-square-o" style="font-size:25px"></i>
											<h5>Order Placed</h5>
										</div>
										<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" align="center">
											<i class="fa fa fa-check-square-o" style="font-size:25px"></i>
											<h5>Payment Received</h5>
										</div>
										<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" align="center">
											<?php if ($_smarty_tpl->tpl_vars['order']->value['date_shipped']!=null) {?>
												<i class="fa fa fa-check-square-o" style="font-size:25px"></i>
											<?php } else { ?>
												<i class="fa fa fa-square-o" style="font-size:25px"></i>
											<?php }?>
											<h5>Dispatched</h5>
										</div>
										<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" align="center">
											<?php if ($_smarty_tpl->tpl_vars['order']->value['date_delivered']!=null) {?>
												<i class="fa fa fa-check-square-o" style="font-size:25px"></i>
											<?php } else { ?>
												<i class="fa fa fa-square-o" style="font-size:25px"></i>
											<?php }?>
											<h5>Delivered</h5>
										</div>
									</div>
								</div>
								<hr>
								<!--SHIPPING INFO-->
								<div class="shippingInfo">
									<div class="row">
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
											<p><span>Shipping Method:</span><br>
											<?php echo $_smarty_tpl->tpl_vars['order']->value['shipping_method_name'];?>
</p>
											<p><span>Payment Method:</span><br>
											<?php echo $_smarty_tpl->tpl_vars['order']->value['payment_method_name'];?>
</p>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
											<p><span>Billing Address:</span><br>
											<?php echo $_smarty_tpl->tpl_vars['order']->value['ba_street'];?>
, <?php echo $_smarty_tpl->tpl_vars['order']->value['ba_door_number'];?>
<br>
											<?php echo $_smarty_tpl->tpl_vars['order']->value['ba_postal_zip'];?>
 <?php echo $_smarty_tpl->tpl_vars['order']->value['ba_city'];?>
<br>
											<?php echo $_smarty_tpl->tpl_vars['order']->value['ba_region'];?>
<br>
											<?php echo $_smarty_tpl->tpl_vars['order']->value['ba_country'];?>
<br>
											Tel: <?php echo $_smarty_tpl->tpl_vars['order']->value['ba_telephone_number'];?>
</p>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
											<p><span>Shipping Address:</span><br>
											<?php echo $_smarty_tpl->tpl_vars['order']->value['sa_street'];?>
, <?php echo $_smarty_tpl->tpl_vars['order']->value['sa_door_number'];?>
<br>
											<?php echo $_smarty_tpl->tpl_vars['order']->value['sa_postal_zip'];?>
 <?php echo $_smarty_tpl->tpl_vars['order']->value['sa_city'];?>
<br>
											<?php echo $_smarty_tpl->tpl_vars['order']->value['sa_region'];?>
<br>
											<?php echo $_smarty_tpl->tpl_vars['order']->value['sa_country'];?>
<br>
											Tel: <?php echo $_smarty_tpl->tpl_vars['order']->value['sa_telephone_number'];?>
</p>
										</div>
									</div>
								</div>								
								<hr>
								<!--SHIPPING CONTENTS-->
								<div class="shippingContents">
									<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
										<div class="product-list">
											<div class="product-image-container">
												<?php if ($_smarty_tpl->tpl_vars['product']->value['url']!=null) {?>
													<img src=<?php echo ("../images/products/").($_smarty_tpl->tpl_vars['product']->value['url']);?>
 alt=<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
>
												<?php } else { ?>
													<img src="../images/products/common/default.png" alt=<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
>
												<?php }?>
											</div>
											<div class="product-info-container">
												<div class="row">
													<div class="list-left-container col-lg-6 col-md-6 col-sm-6 col-xs-12">
														<div class="name"><a href=<?php echo ("product.php?id=").($_smarty_tpl->tpl_vars['product']->value['product_id']);?>
><?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
</a></div>
														<div class="type-brand"><a href=<?php echo ("search.php?keywords=").($_smarty_tpl->tpl_vars['product']->value['keyword_name']);?>
><?php echo $_smarty_tpl->tpl_vars['product']->value['keyword_name'];?>
</a> - <a href=<?php echo ("search.php?brands=").($_smarty_tpl->tpl_vars['product']->value['brand_name']);?>
><?php echo $_smarty_tpl->tpl_vars['product']->value['brand_name'];?>
</a></div>
													</div>
													<div class="list-middle-container col-lg-2 col-md-2 col-sm-2 col-xs-12">
														<div class="price"><span class="price-value"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['price_paid'],2);?>
</span>&euro;</div>
													</div>
													<div class="list-middle-container col-lg-2 col-md-2 col-sm-2 col-xs-12">
														<div class="quantity"><span class="price-value">&times;<?php echo $_smarty_tpl->tpl_vars['product']->value['nr_units'];?>
</span></div>
													</div>
													<div class="list-right-container col-lg-2 col-md-2 col-sm-2 col-xs-12">
														<div class="price"><span class="price-value"><?php echo number_format(($_smarty_tpl->tpl_vars['product']->value['price_paid']*$_smarty_tpl->tpl_vars['product']->value['nr_units']),2);?>
</span>&euro;</div>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
								<hr>
								
								<!--SHIPPING PRICE-->
								<div class="shippingPrice">
									<?php $_smarty_tpl->tpl_vars["total_price"] = new Smarty_variable(0, null, 0);?>
									<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
										<?php $_smarty_tpl->tpl_vars["total_price"] = new Smarty_variable($_smarty_tpl->tpl_vars['total_price']->value+$_smarty_tpl->tpl_vars['product']->value['price_paid']*$_smarty_tpl->tpl_vars['product']->value['nr_units'], null, 0);?>
									<?php } ?>
								
									<span>Total:</span> <?php echo number_format($_smarty_tpl->tpl_vars['total_price']->value,2);?>
&euro;
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			<?php }?>
		</div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
