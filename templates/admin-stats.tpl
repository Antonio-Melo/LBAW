{include file='header.tpl'}

<div class="container-fluid" id="stats-body">
	<!-- Stats -->
	<h1>Stats</h1>
	<hr>
	<div class="stats-content">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th id="pid">ID <i class="fa fa-caret-down"></i></th>
						<th id="pname">Name <i class="fa fa-caret-down"></i></th>
						<th id="prating">Rating <i class="fa fa-caret-down"></i></th>
						<th id="pprice">Price <i class="fa fa-caret-down"></i></th>
						<th id="pstock">Stock <i class="fa fa-caret-down"></i></th>
						<th id="pviews">Nr. Views <i class="fa fa-caret-down"></i></th>
						<th id="pfavorites">Nr. Favorites <i class="fa fa-caret-down"></i></th>
						<th id="psales">Nr. Sales <i class="fa fa-caret-down"></i></th>
					</tr>
				</thead>
				<tbody>
					{foreach $products as $product}
						{if $product.nr_ratings == 0}
							{$rating = 0.00}
						{else}
							{$rating = $product.rating/$product.nr_ratings}
						{/if}
						
						<tr pid={$product.id} pname={$product.name} prating={$rating} pprice={$product.price} pstock={$product.stock} pviews={$product.nr_views} pfavorites={$product.nr_favorites} psales={$product.nr_sales}>
							<td>{$product.id}</td>
							<td><a href={"product.php?id="|cat:$product.id}>{$product.name}</a></td>
							<td>{$rating|string_format:"%.2f"}</td>
							<td>{$product.price}</td>
							<td>{$product.stock}</td>
							<td>{$product.nr_views}</td>
							<td>{$product.nr_favorites}</td>
							<td>{$product.nr_sales}</td>
						</tr>
					{/foreach}
				</tbody>
			</table>
		</div>
	</div>
</div>

{include file='footer.tpl'}