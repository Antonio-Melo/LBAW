<?php /* Smarty version Smarty-3.1.15, created on 2017-05-27 00:41:28
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/recoverpassword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1160646355928bb4162be42-79865766%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e222e0f5fb3b66587a56e120eb887af354750f3a' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/recoverpassword.tpl',
      1 => 1495842085,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1160646355928bb4162be42-79865766',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5928bb4178eca7_48870940',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5928bb4178eca7_48870940')) {function content_5928bb4178eca7_48870940($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
