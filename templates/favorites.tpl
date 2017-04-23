{include file='header.tpl'}

<div class="container-fluid" id="favorites-body">
	<h1>Favorites</h1>
	<hr>
	
	<div class="items-display" id="cart-results">
		{foreach $products as $product}
			<div class="product-list" id={$product.product_id}>
				<button type="button" class="btn remove-favorites-item">
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
						</div>
						<div class="list-middle-container col-lg-4 col-md-4 col-sm-4 col-xs-12">
							{if $product.stock>0}
								<div class="available"><span class="glyphicon glyphicon-ok"></span>&nbsp; Available</div>
							{else}
								<div class="unavailable"><span class="glyphicon glyphicon-remove"></span>&nbsp; Unavailable</div>
							{/if}
							<div class="rating1">
								{if $product.nr_ratings != 0}
									{for $i=1 to $product.rating/$product.nr_ratings}
										<img src="../images/products/common/star.png">
									{/for}
								{/if}
							</div>					
						</div>
						<div class="list-right-container col-lg-4 col-md-4 col-sm-4 col-xs-12">			
							{if $product.sale_price != null}
								<span class="price">{$product.sale_price|number_format:2}&euro;</span>
								<span class="old-price">{$product.price|number_format:2}&euro;</span>
							{else}
								<span class="price">{$product.price|number_format:2}&euro;</span>
							{/if}
							<button class="btn btn-default product-cart-bttn">
								<span class="glyphicon glyphicon-shopping-cart"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		{/foreach}
	</div>	
</div>

{include file='footer.tpl'}