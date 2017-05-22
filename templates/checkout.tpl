{include file='header.tpl'}

<div class="container-fluid" id="checkout-body">
	<h1>Chekout</h1>
	
	<a href="#shippingAddress" class="list-group-item" data-toggle="collapse">
		<h4>Shipping Address</h4>
	</a>
	<div class="collapse container in" id="shippingAddress">

		<!-- My Addresses -->
		<div id="myAddresses">
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
							<button type="button" class="btn btn-primary btn-block profileButton edit-address"> Select </button>
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
								<span class="quantity"> 1 </span>
						</div>
					</div>
				</div>
			</div>
		{/foreach}
	</div>
</div>

{include file='footer.tpl'}
