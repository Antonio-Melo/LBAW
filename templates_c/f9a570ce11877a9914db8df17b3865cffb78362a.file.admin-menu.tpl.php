<?php /* Smarty version Smarty-3.1.15, created on 2017-05-25 09:47:17
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/admin-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:741224600592688d0ad1e34-31237050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9a570ce11877a9914db8df17b3865cffb78362a' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/admin-menu.tpl',
      1 => 1495701573,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '741224600592688d0ad1e34-31237050',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592688d0c43c08_69292638',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592688d0c43c08_69292638')) {function content_592688d0c43c08_69292638($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="admin-menu-body">

	<?php if (isset($_SESSION['id'])&&isset($_SESSION['admin'])) {?>
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
	<?php } else { ?> <!-- No admin privileges --> 
		<h1 id= "access-denied">ACCESS DENIED</h1>
	<?php }?>

</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
