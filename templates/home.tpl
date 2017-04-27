{include file='header.tpl'}

<div class="panel-body items-display">
	<h1>On Sale <a href="search.php?onsale=true"><span class="view-more">&gt;&gt;</span></a></h1>
	<hr>
	<div>
	{foreach $onsale as $product}
		<div class="col-md-4 col-sm-6">
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
				<div class="center-block">
					<span class="name"><a href={"product.php?id="|cat:$product.product_id}>{$product.name}</a></span>
					{if $product.sale_price != null}
						<span class="price">{$product.sale_price|number_format:2}&euro;</span>
						<span class="old-price">{$product.price|number_format:2}&euro;</span>
					{else}
						<span class="price">{$product.price|number_format:2}&euro;</span>
					{/if}
				</div>
			</div>
		</div>
	{/foreach}
	</div>
	<h1>Most Popular <a href="search.php?order=Most%20sold"><span class="view-more">&gt;&gt;</span></a></h1>
	<hr>
	<div>
	{foreach $mostpopular as $product}
		<div class="col-md-4 col-sm-6">
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
				<div class="center-block">
					<span class="name"><a href={"product.php?id="|cat:$product.product_id}>{$product.name}</a></span>
					{if $product.sale_price != null}
						<span class="price">{$product.sale_price|number_format:2}&euro;</span>
						<span class="old-price">{$product.price|number_format:2}&euro;</span>
					{else}
						<span class="price">{$product.price|number_format:2}&euro;</span>
					{/if}
				</div>
			</div>
		</div>
	{/foreach}
	</div>
</div>

{include file='footer.tpl'}
