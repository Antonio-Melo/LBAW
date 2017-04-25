{include file='header.tpl'}

<div class="container-fluid" id="search-body">

	<!-------------------------------------------------------------------------------------------------------------------------->
	<!-- Side -->
	<!-- Mobile extras -->
	<button onclick="openNav()" class="btn btn-default hidden-sm hidden-md hidden-lg" id="side-nav-bttn" type="submit">
		<span class="glyphicon glyphicon-menu-hamburger"></span>
	</button>
	
	<div id="search-mobile-background-filter" class="hidden-xs hidden-sm hidden-md hidden-lg mobile-background-filter" onclick="closeNav()"></div>
	
	<!-- Filters nav -->
	<nav class="panel-group sidenav hidden-xs visible-sm-block visible-md-block visible-lg-block" id="search-filters">
		<a href="javascript:void(0)" class="closebtn hidden-sm hidden-md hidden-lg" onclick="closeNav()">&times;</a>
	
		<!-- Category -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a data-toggle="collapse" href="#filter-categories">Categories</a></h4>
			</div>
			<div id="filter-categories" class="panel-collapse collapse in">
				<ul class="list-group">
					{foreach $products_keywords as $keyword}
						<li class='list-group-item'>
							<label for={$keyword}>{$keyword}</label>
							<div class='custom-checkbox'>
								<input id={$keyword} type='checkbox' value=''>
								<label for={$keyword}></label>
							</div>
						</li>
					{/foreach}
				</ul>
			</div>
		</div>
		
		<!-- Price -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a data-toggle="collapse" href="#filter-price">Price</a></h4>
			</div>
			<div id="filter-price" class="panel-collapse collapse in">
				<label for="filter-price-amount">Range:</label>
				<input type="text" id="filter-price-amount" readonly>
				<div id="filter-price-slider"></div>
			</div>
		</div>
		
		<!-- Brand -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a data-toggle="collapse" href="#filter-brands">Brand</a></h4>
			</div>
			<div id="filter-brands" class="panel-collapse collapse in">
				<ul class="list-group">
					{foreach $products_brands as $brand}
						<li class='list-group-item'>
							<label for={$brand}>{$brand}</label>
							<div class='custom-checkbox'>
								<input id={$brand} type='checkbox' value=''>
								<label for={$brand}></label>
							</div>
						</li>
					{/foreach}
				</ul>
			</div>
		</div>
		
		<!-- On sale -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a data-toggle="collapse" href="#filter-onsale">On sale</a></h4>
			</div>
			<div id="filter-onsale" class="panel-collapse collapse in">
				<ul class="list-group">
					<li class="list-group-item"><label for="scb">On sale</label><div class="custom-checkbox"><input id="scb" type="checkbox" value=""><label for="scb"></label></div></li>
				</ul>
			</div>
		</div>
		
		<!-- Rating -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a data-toggle="collapse" href="#filter-rating">Rating</a></h4>
			</div>
			<div id="filter-rating" class="panel-collapse collapse in">
				<div class="rating">
					<!-- stars -->
					<input id="rating-input-1" type="radio" value="1" name="rating-input"/>
					<label class="rating-star" for="rating-input-1"></label>
					<input id="rating-input-2" type="radio" value="2" name="rating-input"/>
					<label class="rating-star" for="rating-input-2"></label>
					<input id="rating-input-3" type="radio" value="3" name="rating-input"/>
					<label class="rating-star" for="rating-input-3"></label>
					<input id="rating-input-4" type="radio" value="4" name="rating-input"/>
					<label class="rating-star" for="rating-input-4"></label>
					<input id="rating-input-5" type="radio" value="5" name="rating-input"/>
					<label class="rating-star" for="rating-input-5"></label>
					<span>&nbsp & up</span>
				</div>
			</div>
		</div>
		
		<button class="btn btn-default" id="filter-search-bttn">Filter</button>
	</nav>

	<!-------------------------------------------------------------------------------------------------------------------------->
	<!-- Top -->
	<nav id="search-display">
		<!-- Square/List -->
		<button class="btn btn-default" id="search-display-bttn">
			<span class="glyphicon glyphicon-th-large"></span>
		</button>
		
		<!-- Order by -->
		<div class="dropdown" id="search-order">
			<button class="btn btn-default dropdown-toggle" id="search-order-bttn" data-toggle="dropdown">
				{if isset($smarty.get.order)}
					{$smarty.get.order}
				{else}
					Sort by:
				{/if}
				 &nbsp;&nbsp;<span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				<li><a>Relevant</a></li>
				<li><a>Higher price</a></li>
				<li><a>Lower price</a></li>
				<li><a>Most sold</a></li>
				<li><a>Best rating</a></li>
				<li><a>Date released</a></li>
				<li><a>Name: A -> Z</a></li>
				<li><a>Name: Z -> A</a></li>
			</ul>
		</div>
	</nav>
	<hr>

	<!------------------------------------------------------------------------------------------------------------------------->
	<!-- Center -->
	<div class="items-display" id="search-results">		
		{foreach $products as $product}
			<div id={$product.product_id} class="product-mosaic col-lg-3 col-md-4 col-sm-6 col-xs-6">
				<div class="product-image-container">
					{if $product.url != null}
						<a href={"product.php?id="|cat:$product.product_id}><img src={"../images/products/"|cat:$product.url}></a>
					{else}
						<a href={"product.php?id="|cat:$product.product_id}><img src="../images/products/common/default.png"></a>
					{/if}
				</div>
				<div class="product-info-container">
					<div class="center-block">
						<div class="list-left-container">
							<div class="name"><a href={"product.php?id="|cat:$product.product_id}>{$product.product_name}</a></div>
							<div class="type-brand"><a>{$product.keyword_name}</a> - <a>{$product.brand_name}</a></div>					
						</div>
						<div class="list-middle-container">
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
						<div class="list-right-container">
							<div>
								{if $product.sale_price != null}
									<span class="price">{$product.sale_price|number_format:2}&euro;</span>
									<span class="old-price">{$product.price|number_format:2}&euro;</span>
								{else}
									<span class="price">{$product.price|number_format:2}&euro;</span>
									<span class="old-price"></span>
								{/if}
							</div>
							<button class="btn btn-default" id="product-fav-bttn">
								<span class="glyphicon glyphicon-heart"></span>
							</button>
							<button class="btn btn-default" id="product-cart-bttn">
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