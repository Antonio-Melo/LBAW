{include file='header.tpl'}

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
			
			{if !isset($smarty.session.admin)}
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
			{/if}
		</ul>
	
		<div class="tab-content">
			<!-- Account Info -->
			<div id="accountInfo" class="tab-pane in active">
				<div class="param">
					<div class="param-name">
						<b><label for="edit-avatar">Avatar:</label></b>
					</div>
					<div class="avatar-image-container">
						{if $user.url != null}
							<img class="media-object" src={"../images/users/"|cat:$user.url} alt={$user.username}>
						{elseif !isset($smarty.session.admin)}
							<img class="media-object" src="../images/users/common/default_client.png" alt={$user.username}>
						{else}
							<img class="media-object answer-pic" src="../images/users/common/default_admin.png" alt={$user.username}>
						{/if}
						
						<label id="edit-avatar-label" for="edit-avatar" class="btn hide">Upload</label>
						<input type="file" id="edit-avatar" class="hide" name="edit-avatar" accept="image/*">
					</div>
					<div style="clear: both"></div>
				</div>
				<div class="param">
					<div class="param-name">
						<b><label for="edit-username">Username:</label></b>
					</div>
					<div class="param-content">
						<p id="info-username">{$user.username}</p>
						<div class="edit-input">
							<input type="text" id="edit-username" class="hide" name="edit-username" value={$user.username} required></input>
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
						<b><label for="edit-name">Name:</label></b>
					</div>
					<div class="param-content">
						<p id="info-name">{$user.users_name}</p>
						<div class="edit-input">
							<input type="text" id="edit-name" class="hide" name="edit-name" value={$user.users_name} required></input>
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
						<b><label for="edit-email">E-mail address:</label></b>
					</div>
					<div class="param-content">
						<p id="info-email">{$user.email}</p>
						<div class="edit-input">
							<input type="text" id="edit-email" class="hide" name="edit-email" value={$user.email} required></input>
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
						<b><label for="edit-country">Country:</label></b>
					</div>
					<div class="param-content">
						<p id="info-country">{$user.country_name}</p>
						<select name="edit-country" id="edit-country" class="hide country-select" required>
							{foreach from=$countries item=country}
								<option value="{$country.id}"
								{if $country.name == $user.country_name}
									selected
								{/if}
								>{$country.name}</option>
							{/foreach}
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
			
			{if !isset($smarty.session.admin)}
				<!-- My Addresses -->
				<div id="myAddresses" class="tab-pane">
					<ul class="row list-unstyled">
						{foreach $addresses as $address}
							<li class="col-sm-6 col-md-6">
								<div class="adressCard" id={$address.address_id}>
									<div class="addressInfo">
										<p>{$address.street}, {$address.door_number}<br>
										{$address.postal_zip} {$address.city}<br>
										{$address.region}<br>
										{$address.country_name}<br>
										Tel: {$address.telephone_number}</p>
									</div>
									<div class="addressEdit hide">
										<input type="text" class="address-edit-street" placeholder="Street" value={$address.street}></input>
										<input type="text" class="address-edit-door-number" placeholder="Door number" value={$address.door_number}></input>
										<input type="text" class="address-edit-postal-zip" placeholder="Zip code" value={$address.postal_zip}></input>
										<input type="text" class="address-edit-city" placeholder="City" value={$address.city}></input>
										<input type="text" class="address-edit-region" placeholder="Region" value={$address.region}></input>
										<select class="country-select address-edit-country">
											{foreach from=$countries item=country}
												<option value="{$country.id}"
												{if $country.name == $address.country_name}
													selected
												{/if}
												>{$country.name}</option>
											{/foreach}
										</select>
										<input type="text" class="address-edit-telephone" placeholder="Phone number" value={$address.telephone_number}></input>
									</div>
									<button type="button" class="btn btn-primary btn-block profileButton edit-address"><i class="fa fa-pencil"></i></button>
									<button type="button" class="btn btn-primary btn-block profileButton delete-address"><i class="fa fa-trash"></i></button>
									
									<button type="button" class="btn btn-primary btn-block profileButton save-address hide">Save</button>
									<button type="button" class="btn btn-primary btn-block profileButton cancel-address hide">Cancel</button>
								</div>
							</li>
						{/foreach}
					</ul>
					
					<div id="add-address-input" class="hide">
						<div>
							<input type="text" id="address-add-street" placeholder="Street"></input>
							<input type="text" id="address-add-door-number" placeholder="Door number"></input>
							<input type="text" id="address-add-postal-zip" placeholder="Zip code"></input>
							<input type="text" id="address-add-city" placeholder="City"></input>
							<input type="text" id="address-add-region" placeholder="Region"></input>
							<select class="country-select" id="address-add-country">
								{foreach from=$countries item=country}
									<option value="{$country.id}">{$country.name}</option>
								{/foreach}
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
						{foreach $orders as $order}
							<a href={'#'|cat:$order.reference} class="list-group-item" data-toggle="collapse">
								Reference: {$order.reference}
								<i class="fa fa-caret-down"></i>
							</a>
							<div class="collapse order" id={$order.reference}>
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
											{if $order.date_shipped != null}
												<i class="fa fa fa-check-square-o" style="font-size:25px"></i>
											{else}
												<i class="fa fa fa-square-o" style="font-size:25px"></i>
											{/if}
											<h5>Dispatched</h5>
										</div>
										<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" align="center">
											{if $order.date_delivered != null}
												<i class="fa fa fa-check-square-o" style="font-size:25px"></i>
											{else}
												<i class="fa fa fa-square-o" style="font-size:25px"></i>
											{/if}
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
											{$order.shipping_method_name}</p>
											<p><span>Payment Method:</span><br>
											{$order.payment_method_name}</p>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
											<p><span>Billing Address:</span><br>
											{$order.ba_street}, {$order.ba_door_number}<br>
											{$order.ba_postal_zip} {$order.ba_city}<br>
											{$order.ba_region}<br>
											{$order.ba_country}<br>
											Tel: {$order.ba_telephone_number}</p>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
											<p><span>Shipping Address:</span><br>
											{$order.sa_street}, {$order.sa_door_number}<br>
											{$order.sa_postal_zip} {$order.sa_city}<br>
											{$order.sa_region}<br>
											{$order.sa_country}<br>
											Tel: {$order.sa_telephone_number}</p>
										</div>
									</div>
								</div>								
								<hr>
								<!--SHIPPING CONTENTS-->
								<div class="shippingContents">
									{foreach $order.products as $product}
										<div class="product-list">
											<div class="product-image-container">
												{if $product.url != null}
													<img src={"../images/products/"|cat:$product.url} alt={$product.product_name}>
												{else}
													<img src="../images/products/common/default.png" alt={$product.product_name}>
												{/if}
											</div>
											<div class="product-info-container">
												<div class="row">
													<div class="list-left-container col-lg-6 col-md-6 col-sm-6 col-xs-12">
														<div class="name"><a href={"product.php?id="|cat:$product.product_id}>{$product.product_name}</a></div>
														<div class="type-brand"><a href={"search.php?keywords="|cat:$product.keyword_name}>{$product.keyword_name}</a> - <a href={"search.php?brands="|cat:$product.brand_name}>{$product.brand_name}</a></div>
													</div>
													<div class="list-middle-container col-lg-2 col-md-2 col-sm-2 col-xs-12">
														<div class="price"><span class="price-value">{$product.price_paid|number_format:2}</span>&euro;</div>
													</div>
													<div class="list-middle-container col-lg-2 col-md-2 col-sm-2 col-xs-12">
														<div class="quantity"><span class="price-value">&times;{$product.nr_units}</span></div>
													</div>
													<div class="list-right-container col-lg-2 col-md-2 col-sm-2 col-xs-12">
														<div class="price"><span class="price-value">{($product.price_paid*$product.nr_units)|number_format:2}</span>&euro;</div>
													</div>
												</div>
											</div>
										</div>
									{/foreach}
								</div>
								<hr>
								
								<!--SHIPPING PRICE-->
								<div class="shippingPrice">
									{assign var="total_price" value=0}
									{foreach $order.products as $product}
										{assign var="total_price" value=$total_price+$product.price_paid*$product.nr_units}
									{/foreach}
								
									<span>Total:</span> {$total_price|number_format:2}&euro;
								</div>
							</div>
						{/foreach}
					</div>
				</div>
			{/if}
		</div>
    </div>
</div>

{include file='footer.tpl'}
