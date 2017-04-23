{include file='header.tpl'}

<div class="container-fluid" id="category-body">
	<h1>{$category.name}</h1>
	<hr>
	<div class="items-display">
		<h2>On Sale <a href="search.php"><span class="view-more">&gt;&gt;</span></a></h2>
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
						<span class="name"><a href={"product.php?id="|cat:$product.product_id}>{$product.product_name}</a></span>
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
	
	<div class="items-display">
		<h2>Most Popular <a href="search.php"><span class="view-more">&gt;&gt;</span></a></h2>
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
						<span class="name"><a href={"product.php?id="|cat:$product.product_id}>{$product.product_name}</a></span>
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