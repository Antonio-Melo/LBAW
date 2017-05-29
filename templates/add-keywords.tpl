{include file='header.tpl'}

<div class="container-fluid" id="keywords-body">
	<!-- Add Keywords -->
	<h1>Add Keywords</h1>
	<hr>
	<div class="keywords-content">
		<form method="post" action="../actions/add-keyword.php">
			<label for="category">Category:</label>
			<input class="form-control" type="text" name="category" id="category">
			<button type="submit" class="btn button">Add</button>
		</form>
		<form method="post" action="../actions/add-keyword.php">
			<label for="brand">Brand:</label>
			<input class="form-control" type="text" name="brand" id="brand">
			<button type="submit" class="btn button">Add</button>
		</form>
	</div>
</div>

{include file='footer.tpl'}