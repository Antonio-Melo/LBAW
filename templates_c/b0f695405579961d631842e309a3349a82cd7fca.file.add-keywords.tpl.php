<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 06:28:36
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/add-keywords.tpl" */ ?>
<?php /*%%SmartyHeaderCode:975318597592bb0c8351033-38417342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0f695405579961d631842e309a3349a82cd7fca' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/add-keywords.tpl',
      1 => 1496035714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '975318597592bb0c8351033-38417342',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592bb0c846fcf6_87007585',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592bb0c846fcf6_87007585')) {function content_592bb0c846fcf6_87007585($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
