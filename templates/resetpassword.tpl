{include file='header.tpl'}

<div class="container-fluid" id="resetpassword-body">
	<!-- Reset password -->
	<h1>Reset password</h1>
	<hr>
	<div class="resetpassword-content">
		<form id="reset" method="post" action="../actions/resetpassword.php">
			<p>Please enter your new password.</p>
			
			<label for="password">New password:</label>
			<div class="register-input">
				<input type="password" name="password" id="password" required>
				<div class="error-sign hide">!</div>
				<div class="error-message hide">
					Passwords must match.<br>
					Must have between 6 and 128 characters.
				</div>
			</div>
			
			<label for="confirm">Confirm new password:</label>
			<div class="register-input">
				<input type="password" name="confirm" id="confirm" required>
				<div class="error-sign hide">!</div>
				<div class="error-message hide">
					Passwords must match.<br>
					Must have between 6 and 128 characters.
				</div>
			</div>
			
			<div id="error-container">
				<span class="authentication-error" id="edit-password-error"></span>
			</div>
			
			<input type="hidden" name="username" id="username" value={$username}>
			
			<button class="btn btn-default" id="submit" type="submit">Submit</button>
		</form>
	</div>
</div>

{include file='footer.tpl'}