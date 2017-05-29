{include file='header.tpl'}

<div class="container-fluid" id="orders-body">
	<!-- Orders -->
	<h1>Pending orders</h1>
	<hr>
	<div class="orders-content">
		<form action="admin-orders.php" method="get">
			<input type="text" id="search-orders" name="search-orders" class="form-control">
			<button type="submit" class="btn button">Search</button>
		</form>
	
		{if count($orders) < 1}
			<span class="glyphicon glyphicon-remove"></span>
			<p>No orders were found for your search!</p>
		{else}
			<div class="table-responsive">
				<table id="orders" class="table table-hover">
					<thead>
						<tr>
							<th>Reference</th>
							<th>User</th>
							<th>Date Ordered</th>
							<th>Date Delived</th>
							<th>Date Shipped</th>
						</tr>
					</thead>
					<tbody>
						{foreach $orders as $order}
							<tr id={$order.id}>
								<td>{$order.reference}</td>
								<td>{$order.name} ({$order.username})</td>
								<td>{$order.date_ordered}</td>
								<td>
									{if $order.date_shipped == null}
										<button class="button btn ship">Ship</button>
									{else}
										{$order.date_shipped}
									{/if}
								</td>
								<td>
									{if $order.date_delivered == null && $order.date_shipped == null}
										<button class="button btn deliver hidden">Deliver</button>
									{elseif $order.date_delivered == null}
										<button class="button btn deliver">Deliver</button>
									{else}
										{$order.date_delivered}
									{/if}
								</td>
							</tr>
						{/foreach}
					</tbody>
				</table>
			</div>
		{/if}
	</div>
</div>

{include file='footer.tpl'}