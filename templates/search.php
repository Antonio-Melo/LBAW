<div class="container-fluid" id="search-body">

	<!-- Side -->
	<!-- make this a side menu for mobile -->
	<nav class="panel-group hidden-xs" id="search-filters">
		<!-- Category -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a data-toggle="collapse" href="#filter-categories">Categories</a></h4>
			</div>
			<div id="filter-categories" class="panel-collapse collapse in">
				<ul class="list-group">
					<li class="list-group-item"><div class="checkbox"><label>Smartphones<input type="checkbox" value=""></label></div></li>
					<li class="list-group-item"><div class="checkbox"><label>Tablets<input type="checkbox" value=""></label></div></li>
					<li class="list-group-item"><div class="checkbox"><label>Laptop<input type="checkbox" value=""></label></div></li>
				</ul>
			</div>
		</div>
		
		<!-- Price -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a data-toggle="collapse" href="#filter-price">Price</a></h4>
			</div>
			<div id="filter-price" class="panel-collapse collapse in">
				<!-- http://jqueryui.com/slider/#range -->
				<div id="price-slider"></div>
			</div>
		</div>
		
		<!-- Brand -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a data-toggle="collapse" href="#filter-brands">Brand</a></h4>
			</div>
			<div id="filter-brands" class="panel-collapse collapse in">
				<ul class="list-group">
					<li class="list-group-item"><div class="checkbox"><label>Samsung<input type="checkbox" value=""></label></div></li>
					<li class="list-group-item"><div class="checkbox"><label>Apple<input type="checkbox" value=""></label></div></li>
					<li class="list-group-item"><div class="checkbox"><label>Nokia<input type="checkbox" value=""></label></div></li>
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
					<li class="list-group-item"><div class="checkbox"><label>On sale<input type="checkbox" value=""></label></div></li>
				</ul>
			</div>
		</div>
		
		<!-- Rating -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a data-toggle="collapse" href="#filter-rating">Rating</a></h4>
			</div>
			<div id="filter-rating" class="panel-collapse collapse in">
				<ul class="list-group">
					<!-- stars -->
					<input type="radio" name="rating-input" value="1">
					<input type="radio" name="rating-input" value="2">
					<input type="radio" name="rating-input" value="3">
					<input type="radio" name="rating-input" value="4">
					<input type="radio" name="rating-input" value="5">
				</ul>
			</div>
		</div>
	</nav>

	<!-- Top -->
	<nav id="search-display">
		<!-- Square/List -->
		<!-- Order by -->
	</nav>

	<!-- Center -->
	<div id="search-results">
		<!-- Results -->
	</div>

</div>