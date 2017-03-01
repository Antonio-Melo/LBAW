<div class="container-fluid" id="search-body">

	<!-------------------------------------------------------------------------------------------------------------------------->
	<!-- Side -->
	<!-- Mobile extras -->
	<button onclick="openNav()" class="btn btn-default hidden-sm hidden-md hidden-lg" id="side-nav-bttn" type="submit">
		<span class="glyphicon glyphicon-menu-hamburger"></span>
	</button>
	
	<div id="search-mobile-background-filter" class="hidden-xs hidden-sm hidden-md hidden-lg mobile-background-filter"></div>
	
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
					<li class="list-group-item"><label for="cb1">Smartphones</label><div class="custom-checkbox"><input id="cb1" type="checkbox" value=""><label for="cb1"></label></div></li>
					<li class="list-group-item"><label for="cb2">Tablets</label><div class="custom-checkbox"><input id="cb2" type="checkbox" value=""><label for="cb2"></label></div></li>
					<li class="list-group-item"><label for="cb3">Laptop</label><div class="custom-checkbox"><input id="cb3" type="checkbox" value=""><label for="cb3"></label></div></li>
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
					<li class="list-group-item"><label for="cb4">Samsung</label><div class="custom-checkbox"><input id="cb4" type="checkbox" value=""><label for="cb4"></label></div></li>
					<li class="list-group-item"><label for="cb5">Apple</label><div class="custom-checkbox"><input id="cb5" type="checkbox" value=""><label for="cb5"></label></div></li>
					<li class="list-group-item"><label for="cb6">Nokia</label><div class="custom-checkbox"><input id="cb6" type="checkbox" value=""><label for="cb6"></label></div></li>
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
					<li class="list-group-item"><label for="cb7">On sale</label><div class="custom-checkbox"><input id="cb7" type="checkbox" value=""><label for="cb7"></label></div></li>
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
				Sort by: &nbsp;&nbsp;<span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				<li><a href="#">Relevant</a></li>
				<li><a href="#">Higher price</a></li>
				<li><a href="#">Lower price</a></li>
				<li><a href="#">Most sold</a></li>
				<li><a href="#">Best rating</a></li>
				<li><a href="#">Date released</a></li>
				<li><a href="#">Name: A -> Z</a></li>
				<li><a href="#">Name: Z -> A</a></li>
			</ul>
		</div>
	</nav>

	<!------------------------------------------------------------------------------------------------------------------------->
	<!-- Center -->
	<div id="search-results">
		<!-- Results -->
	</div>

</div>
