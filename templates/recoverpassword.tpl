{include file='header.tpl'}

<div class="container-fluid" id="recoverpassword-body">
	<!-- Recover password -->
	<h1>Recover password</h1>
	<hr>
	<div class="recoverpassword-content">
		<form id="recover" method="post" action="../actions/recoverpassword.php">
			<p>Please enter your username or email. You will send a confirmation email shortly.</p>
			
			<label for="username">Username/Email:</label>
			<input type="text" name="username" id="username" required>
			
			<button class="btn btn-default" id="submit" type="submit">Submit</button>
		</form>
	</div>
</div>

{include file='footer.tpl'}