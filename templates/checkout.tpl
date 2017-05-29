{include file='header.tpl'}

<div class="container-fluid" id="checkout-body">
	<h1>Chekout</h1>
	
	<a class="list-group-item">
		<h4>Shipping Address</h4>
	</a>
	<div class="collapse container in" id="shippingAddress">
		{if !isset($smarty.session.admin)}
		<!-- My Addresses -->
		<div id="myAddresses">
			<ul class="row list-unstyled">
				{foreach $addresses as $address}
					<li class="col-sm-6 col-md-6">
						<div class="addressCard" id={$address.address_id}>
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
							<button type="button" class="btn btn-primary btn-block select-address" id={$address.address_id} data-toggle="collapse" data-target="#shippingAddress,#shippingMethod" data-parent="#checkout-body">Select</button>
							<button type="button" class="btn btn-primary btn-block edit-address"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-primary btn-block delete-address"><i class="fa fa-trash"></i></button>

							<button type="button" class="btn btn-primary btn-block save-address hide">Save</button>
							<button type="button" class="btn btn-primary btn-block cancel-address hide">Cancel</button>
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
				<button type="button" id="save-add-address" class="btn btn-primary btn-block addressButton">Save</button>
				<button type="button" id="cancel-add-address" class="btn btn-primary btn-block addressButton">Cancel</button>
			</div>

			<button id="add-address-button" type="button" class="btn btn-primary btn-block add-address">Add</button>
		</div>
		{/if}
	</div>

	<div class="selectedAddress hide">
		<div id="selectedAddressInfo">
		</div>
		<button type="button" class="btn btn-primary btn-block change-address">Change</button>
	</div>

	<a class="list-group-item" data-toggle="collapse">
		<h4>Shipping Method</h4>
	</a>
	<div class="collapse container" id="shippingMethod">
		{if !isset($smarty.session.admin)}
		<!-- Shipping Methods -->
		<div id="shippingMethodsList">
			<ul class="row list-unstyled">
				{foreach $shippingmethods as $shippingmethod}
					<li class="col-sm-6 col-md-6">
						<div class="shippingCard" id={$shippingmethod.name}>
							<div class="shippingInfo">
								<h4>{$shippingmethod.name}</h4>
								<p>{$shippingmethod.price}&euro;</p>
							</div>
							<button type="button" class="btn btn-primary btn-block select-shipping-method" id={$shippingmethod.name} name={$shippingmethod.id} data-toggle="collapse" data-target="#shippingMethod,#paymentMethod" data-parent="#checkout-body">Select</button>
						</div>
					</li>
				{/foreach}
			</ul>
		</div>
		{/if}
	</div>

	<div class="selectedShipping hide">
		<div id="selectedShippingInfo">
		</div>
		<button type="button" class="btn btn-primary btn-block change-shipping"	>Change</button>
	</div>

	<a class="list-group-item">
		<h4>Payment Method</h4>
	</a>
	<div class="collapse container" id="paymentMethod">
		{if !isset($smarty.session.admin)}
		<!-- Shipping Methods -->
		<div id="shippingMethodsList">
			<ul class="row list-unstyled">
				{foreach $paymentmethods as $paymentmethod}
					<li class="col-sm-6 col-md-6">
						<div class="shippingCard" id={$paymentmethod.name}>
							<div class="shippingInfo">
								{if $paymentmethod.id == 1}
								<span class="fa fa-cc-visa" style="font-size:48px;color:#494e6b"></span>
								<span class="fa fa-cc-mastercard" style="font-size:48px;color:#494e6b"></span>
								{elseif $paymentmethod.id == 2}
								<span class="fa fa-paypal" style="font-size:48px;color:#494e6b" ></span>
								{/if}
								<h4>{$paymentmethod.name}</h4>
							</div>
							<button type="button" class="btn btn-primary btn-block select-payment-method" id={$paymentmethod.name} name={$paymentmethod.id} data-toggle="collapse" data-target="#paymentMethod, #billingAddress" data-parent="#checkout-body">Select</button>
						</div>
					</li>
				{/foreach}
			</ul>
		</div>
		{/if}
	</div>
	
	<div class="selectedPayment hide">
		<div id="selectedPaymentInfo">
		</div>
		<button type="button" class="btn btn-primary btn-block change-payment-method">Change</button>
	</div>

	<a class="list-group-item">
		<h4>Billing Address</h4>
	</a>
	<div class="collapse container" id="billingAddress">
		{if !isset($smarty.session.admin)}
		<!-- My Addresses -->
		<div id="myAddresses">
			<ul class="row list-unstyled">
				{foreach $addresses as $address}
					<li class="col-sm-6 col-md-6">
						<div class="addressCard" id={$address.address_id}>
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
							<button type="button" class="btn btn-primary btn-block select-billing-address" id={$address.address_id} data-toggle="collapse" data-target="#billingAddress" data-parent="#checkout-body">Select</button>
							<button type="button" class="btn btn-primary btn-block edit-address"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-primary btn-block delete-address"><i class="fa fa-trash"></i></button>

							<button type="button" class="btn btn-primary btn-block save-address hide">Save</button>
							<button type="button" class="btn btn-primary btn-block cancel-address hide">Cancel</button>
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
				<button type="button" id="save-add-address" class="btn btn-primary btn-block addressButton">Save</button>
				<button type="button" id="cancel-add-address" class="btn btn-primary btn-block addressButton">Cancel</button>
			</div>

			<button id="add-address-button" type="button" class="btn btn-primary btn-block add-address">Add</button>
		</div>
		{/if}
	</div>

	<div class="selectedBillingAddress hide">
		<div id="selectedBillingAddressInfo">
		</div>
		<button type="button" class="btn btn-primary btn-block change-billing-address">Change</button>
	</div>

	<button type="button" class="btn btn-primary btn-block" id="submit-order" disabled>Submit Order</button>

	<h4>Order Summary</h4>
	
	<div class="checkout-cart">
		<span class="checkout-subtotal">Subtotal: <span class="checkout-subtotal-value"></span></span>
	</div>
	
	<div class="items-display" id="cart-results">		
		{foreach $products as $product}
			<div class="product-list">
			
				<div class="product-image-container">
					<a href={"product.php?id="|cat:$product.product_id}>
						{if $product.url != null}
							<img src={"../images/products/"|cat:$product.url} alt={$product.product_name}>
						{else}
							<img src="../images/products/common/default.png" alt={$product.product_name}>
						{/if}
					</a>
				</div>
				
				<div class="product-info-container">
					<div class="row">
						<div class="list-left-container col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="name"><a href={"product.php?id="|cat:$product.product_id}>{$product.product_name}</a></div>
							<div class="type-brand"><a>{$product.keyword_name}</a> - <a>{$product.brand_name}</a></div>
							{if $product.stock>0}
								<div class="available"><span class="glyphicon glyphicon-ok"></span>&nbsp; Available</div>
							{else}
								<div class="unavailable"><span class="glyphicon glyphicon-remove"></span>&nbsp; Unavailable</div>
							{/if}
							<div class="rating">
								{if $product.nr_ratings != 0}
									{for $i=1 to $product.rating/$product.nr_ratings}
										<img src="../images/products/common/star.png" alt={$product.rating/$product.nr_ratings}>
									{/for}
								{/if}
							</div>
						</div>
						<div class="list-middle-container col-lg-6 col-md-6 col-sm-6 col-xs-12">
							{if $product.sale_price != null}
								<span class="price">{$product.sale_price|number_format:2}&euro;</span>
								<span class="old-price">{$product.price|number_format:2}&euro;</span>
							{else}
								<span class="price">{$product.price|number_format:2}&euro;</span>
							{/if}
						</div>
						<div class="list-right-container col-lg-2 col-md-2 col-sm-2 col-xs-12">
							{$index=$product.product_id}
							{if $product.sale_price != null}
								<span value = {$smarty.post.$index} class={$product.sale_price|number_format:2} name={$product.product_id} id="quantity"> {$smarty.post.$index} </span>
							{else}
								<span value = {$smarty.post.$index} class={$product.price|number_format:2} name={$product.product_id} id="quantity"> {$smarty.post.$index} </span>
							{/if}
						</div>
					</div>
				</div>
			</div>
		{/foreach}
	</div>
</div>

{include file='footer.tpl'}
