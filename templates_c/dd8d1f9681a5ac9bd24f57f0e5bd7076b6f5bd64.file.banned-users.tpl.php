<?php /* Smarty version Smarty-3.1.15, created on 2017-05-25 10:51:35
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/banned-users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:295146638592698b1c7f9c2-32334599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd8d1f9681a5ac9bd24f57f0e5bd7076b6f5bd64' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/banned-users.tpl',
      1 => 1495705889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '295146638592698b1c7f9c2-32334599',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592698b1e1a9f6_92587016',
  'variables' => 
  array (
    'banned' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592698b1e1a9f6_92587016')) {function content_592698b1e1a9f6_92587016($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="banned-users-body">

	<?php if (isset($_SESSION['id'])&&isset($_SESSION['admin'])) {?>
	<!-- Only admins have access to this page's content -->
		<h1>Banned-Users</h1>
		<hr>

		<div class="row">

			<div class="col-md-3 col-xs-3">
				<h3> User </h3>
				<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['banned']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
					<p><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</p>
				<?php } ?>
			</div>

			<div class="col-md-3 col-xs-3">
				<h3> ID </h3>
				<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['banned']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
					<p><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</p>
				<?php } ?>
			</div>

			<div class="col-md-3 col-xs-3">
				<h3> Date of Unban </h3>
				<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['banned']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
					<p><?php echo $_smarty_tpl->tpl_vars['user']->value['date']-'unban';?>
</p>
				<?php } ?>
			</div>

			<div class="col-md-3 col-xs-3">
				<h1> Unban</h1>
				<div class="btn-group-vertical" id="unban-buttons">
					<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['banned']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>

						<button id="unban" type="button" class="btn btn-sm">Unban</button>

					<?php } ?>
				</div>	
			</div>

		</div>


	<?php } else { ?> <!-- No admin privileges -->
		<h1 id= "access-denied">ACCESS DENIED</h1>
	<?php }?>

</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
