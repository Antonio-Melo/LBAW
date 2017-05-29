<?php /* Smarty version Smarty-3.1.15, created on 2017-05-27 03:26:44
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/resetpassword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14646582545928d403a95fa8-45926953%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b74df08682b71d4555c772908cdf947b4b85534' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/resetpassword.tpl',
      1 => 1495852001,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14646582545928d403a95fa8-45926953',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5928d403bf8b74_70581525',
  'variables' => 
  array (
    'username' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5928d403bf8b74_70581525')) {function content_5928d403bf8b74_70581525($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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
			
			<input type="hidden" name="username" id="username" value=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
>
			
			<button class="btn btn-default" id="submit" type="submit">Submit</button>
		</form>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
