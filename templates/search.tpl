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
			<a data-toggle="collapse" href="#filter-categories">
				<div class="panel-heading">
					<h4 class="panel-title">Categories<i class="fa fa-caret-down"></i></h4>
				</div>
			</a>
			<div id="filter-categories" class="panel-collapse collapse in">
				<ul class="list-group">
					{foreach $products_keywords as $keyword}
						<li class='list-group-item'>
							<label for={$keyword}>{$keyword}</label>
							<div class='custom-checkbox'>
								<input id={$keyword} type='checkbox' value=''
								{if in_array($keyword, $filters.keywords)}
									checked
								{/if}
								>
								<label for={$keyword}></label>
							</div>
						</li>
					{/foreach}
				</ul>
			</div>
		</div>
		
		<!-- Price -->
		<div class="panel panel-default">
			<a data-toggle="collapse" href="#filter-price">
				<div class="panel-heading">
					<h4 class="panel-title">Price<i class="fa fa-caret-down"></i></h4>
				</div>
			</a>
			<div id="filter-price" class="panel-collapse collapse in">
				<label for="filter-price-amount">Range:</label>
				<input type="text" id="filter-price-amount" readonly>
				<div id="filter-price-slider"
				{if isset($filters.prices[0]) && isset($filters.prices[1])}
					min={$filters.prices[0]} max={$filters.prices[1]}
				{/if}
				></div>
			</div>
		</div>
		
		<!-- Brand -->
		<div class="panel panel-default">
			<a data-toggle="collapse" href="#filter-brands">
				<div class="panel-heading">
					<h4 class="panel-title">Brand<i class="fa fa-caret-down"></i></h4>
				</div>
			</a>
			<div id="filter-brands" class="panel-collapse collapse in">
				<ul class="list-group">
					{foreach $products_brands as $brand}
						<li class='list-group-item'>
							<label for={$brand}>{$brand}</label>
							<div class='custom-checkbox'>
								<input id={$brand} type='checkbox' value=''
								{if in_array($brand, $filters.brands)}
									checked
								{/if}
								>
								<label for={$brand}></label>
							</div>
						</li>
					{/foreach}
				</ul>
			</div>
		</div>
		
		<!-- On sale -->
		<div class="panel panel-default">
			<a data-toggle="collapse" href="#filter-onsale">
				<div class="panel-heading">
					<h4 class="panel-title">On sale<i class="fa fa-caret-down"></i></h4>
				</div>
			</a>
			<div id="filter-onsale" class="panel-collapse collapse in">
				<ul class="list-group">
					<li class="list-group-item"><label for="scb">On sale</label><div class="custom-checkbox"><input id="scb" type="checkbox" value=""
					{if $filters.onsale=="true"}
						checked
					{/if}
					><label for="scb"></label></div></li>
				</ul>
			</div>
		</div>
		
		<!-- Rating -->
		<div class="panel panel-default">
			<a data-toggle="collapse" href="#filter-rating">
				<div class="panel-heading">
					<h4 class="panel-title">Rating<i class="fa fa-caret-down"></i></h4>
				</div>
			</a>
			<div id="filter-rating" class="panel-collapse collapse in">
				<div class="rating">
					<!-- stars -->
					{for $i=1 to 5}
						<input id={"rating-input-"|cat:$i} type="radio" value={$i} name="rating-input"
						{if isset($filters.rating) && $i == $filters.rating}
							checked
						{/if}						
						/>
						<label class="rating-star" for={"rating-input-"|cat:$i}></label>
					{/for}
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
				<li><a>Name: A -> Z</a></li>
				<li><a>Name: Z -> A</a></li>
			</ul>
		</div>
	</nav>
	<hr>

	<!------------------------------------------------------------------------------------------------------------------------->
	<!-- Center -->
	<div class="items-display" id="search-results">
		{if $nr_pages > 1}
			<div class="page-selector">
				<ul class="pagination pull-right">
					<li><a go=1><span class="glyphicon glyphicon-menu-left"></span><span class="glyphicon glyphicon-menu-left"></span></a></li>
					<li><a go={$current_page} before=true><span class="glyphicon glyphicon-menu-left"></span></a></li>
					{for $i=$start_page to $end_page}
						<li 
						{if $i == $current_page}
							class="active"
						{/if}
						><a go={$i}>{$i}</a><li>
					{/for}
					<li><a go={$current_page} max={$nr_pages} next=true><span class="glyphicon glyphicon-menu-right"></span></a></li>
					<li><a go={$nr_pages}><span class="glyphicon glyphicon-menu-right"></span><span class="glyphicon glyphicon-menu-right"></span></a></li>
				</ul>
			</div>
		{/if}
	
		{foreach $products as $product}
			<div id={$product.product_id} class="product-mosaic col-lg-3 col-md-4 col-sm-6 col-xs-6">
				<div class="product-image-container">
					{if $product.url != null}
						<a href={"product.php?id="|cat:$product.product_id}><img src={"../images/products/"|cat:$product.url} alt={$product.product_name}></a>
					{else}
						<a href={"product.php?id="|cat:$product.product_id}><img src="../images/products/common/default.png" alt={$product.product_name}></a>
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
									{for $i=1 to round($product.rating/$product.nr_ratings)}
										<img src="../images/products/common/star.png" alt={$product.rating/$product.nr_ratings}>
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
		
		{if $nr_pages > 1}
			<div class="page-selector">
				<ul class="pagination pull-right">
					<li><a go=1><span class="glyphicon glyphicon-menu-left"></span><span class="glyphicon glyphicon-menu-left"></span></a></li>
					<li><a go={$current_page} before=true><span class="glyphicon glyphicon-menu-left"></span></a></li>
					{for $i=$start_page to $end_page}
						<li 
						{if $i == $current_page}
							class="active"
						{/if}
						><a go={$i}>{$i}</a><li>
					{/for}
					<li><a go={$current_page} max={$nr_pages} next=true><span class="glyphicon glyphicon-menu-right"></span></a></li>
					<li><a go={$nr_pages}><span class="glyphicon glyphicon-menu-right"></span><span class="glyphicon glyphicon-menu-right"></span></a></li>
				</ul>
			</div>
		{/if}		
	</div>
</div>


{include file='footer.tpl'}
