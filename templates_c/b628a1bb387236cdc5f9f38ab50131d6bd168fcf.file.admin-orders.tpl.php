<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 04:07:25
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/admin-orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1230641177592b7ddd55a790-81300147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b628a1bb387236cdc5f9f38ab50131d6bd168fcf' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/admin-orders.tpl',
      1 => 1496027244,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1230641177592b7ddd55a790-81300147',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592b7ddd6ee887_97997505',
  'variables' => 
  array (
    'i' => 0,
    'not_shipped' => 0,
    'not_delivered' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592b7ddd6ee887_97997505')) {function content_592b7ddd6ee887_97997505($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="orders-body">
	<!-- Orders -->
	<h1>Pending orders</h1>
	<hr>
	<div class="orders-content">
		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
		<p><?php echo $_smarty_tpl->tpl_vars['not_shipped']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</p>
		<p><?php echo $_smarty_tpl->tpl_vars['not_delivered']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</p>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
