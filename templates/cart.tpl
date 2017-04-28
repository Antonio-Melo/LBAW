{include file='header.tpl'}

<div class="container-fluid" id="cart-body">
	<h1>Shopping cart</h1>
	<hr>
	
	{if count($products)>0}
		<div class="checkout-cart">
			<span class="checkout-subtotal">Subtotal: <span class="checkout-subtotal-value"></span></span>
			<button type="button" class="btn checkout-button ">Checkout</button>
		</div>
	{else}
		<span class="glyphicon glyphicon-shopping-cart"></span>
		<p>Your shopping cart is empty right now, but it doesn't have to be!</p>
		<div class="checkout-cart">
			<button type="button" class="button">Go Shopping</button>
		</div>
	{/if}
	
	<div class="items-display" id="cart-results">		
		{foreach $products as $product}
			<div class="product-list">
				<button type="button" class="btn remove-cart-item" id={$product.product_id}>
					<span class="glyphicon glyphicon-remove"></span>
				</button>
			
				<div class="product-image-container">
					<a href={"product.php?id="|cat:$product.product_id}>
						{if $product.url != null}
							<img src={"../images/products/"|cat:$product.url}>
						{else}
							<img src="../images/products/common/default.png">
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
										<img src="../images/products/common/star.png">
									{/for}
								{/if}
							</div>
						</div>
						<div class="list-middle-container col-lg-4 col-md-4 col-sm-4 col-xs-12">
							{if $product.sale_price != null}
								<span class="price">{$product.sale_price|number_format:2}&euro;</span>
								<span class="old-price">{$product.price|number_format:2}&euro;</span>
							{else}
								<span class="price">{$product.price|number_format:2}&euro;</span>
							{/if}
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
		{/foreach}
	</div>
	
	{if count($products)>=3}
		<div class="checkout-cart">
			<span class="checkout-subtotal">Subtotal: <span class="checkout-subtotal-value"></span></span>
			<button type="button" class="btn checkout-button ">Checkout</button>
		</div>
	{/if}
</div>

{include file='footer.tpl'}