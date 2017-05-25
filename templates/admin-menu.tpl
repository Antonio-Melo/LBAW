{include file='header.tpl'}

<div class="container-fluid" id="admin-menu-body">

	{if isset($smarty.session.id) && isset($smarty.session.admin)}
	<!-- Only admins have access to this page's content -->
		<h1>Admin-Menu</h1>
		<hr>
		<div class="admin-menu-content">
			<h2>Product Actions</h2>
			<p><a href="add-product.php"><span class="glyphicon glyphicon-chevron-right"></span> Add product</a></p>
			<!-- <p><a href="remove-product.php"><span class="glyphicon glyphicon-chevron-right"></span> Remove Product</a></p> -->
			<!-- <p><a href="edit-product.php"><span class="glyphicon glyphicon-chevron-right"></span> Edit Product</a></p> -->
			<h2>User Actions</h2>
			<p><a href="check-reports.php"><span class="glyphicon glyphicon-chevron-right"></span> Check Reports</a></p>
			<p><a href="banned-users.php"><span class="glyphicon glyphicon-chevron-right"></span> Banned Users</a></p>
			<h2>Other</h2>
			<p><a href="admin-stats.php"><span class="glyphicon glyphicon-chevron-right"></span> Admin Stats</a></p>
		</div>
	{else} <!-- No admin privileges --> 
		<h1 id= "access-denied">ACCESS DENIED</h1>
	{/if}

</div>

{include file='footer.tpl'}