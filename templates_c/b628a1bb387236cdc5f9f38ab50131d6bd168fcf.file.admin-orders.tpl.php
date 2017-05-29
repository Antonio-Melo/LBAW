<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 11:23:32
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/admin-orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1230641177592b7ddd55a790-81300147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b628a1bb387236cdc5f9f38ab50131d6bd168fcf' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/admin-orders.tpl',
      1 => 1496053297,
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
    'orders' => 0,
    'order' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592b7ddd6ee887_97997505')) {function content_592b7ddd6ee887_97997505($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="orders-body">
	<!-- Orders -->
	<h1>Pending orders</h1>
	<hr>
	<div class="orders-content">
		<form action="admin-orders.php" method="get">
			<input type="text" id="search-orders" name="search-orders" class="form-control">
			<button type="submit" class="btn button">Search</button>
		</form>
	
		<?php if (count($_smarty_tpl->tpl_vars['orders']->value)<1) {?>
			<span class="glyphicon glyphicon-remove"></span>
			<p>No orders were found for your search!</p>
		<?php } else { ?>
			<div class="table-responsive">
				<table id="orders" class="table table-hover">
					<thead>
						<tr>
							<th>Reference</th>
							<th>User</th>
							<th>Date Ordered</th>
							<th>Date Delived</th>
							<th>Date Shipped</th>
						</tr>
					</thead>
					<tbody>
						<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
							<tr id=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
>
								<td><?php echo $_smarty_tpl->tpl_vars['order']->value['reference'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['order']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['order']->value['username'];?>
)</td>
								<td><?php echo $_smarty_tpl->tpl_vars['order']->value['date_ordered'];?>
</td>
								<td>
									<?php if ($_smarty_tpl->tpl_vars['order']->value['date_shipped']==null) {?>
										<button class="button btn ship">Ship</button>
									<?php } else { ?>
										<?php echo $_smarty_tpl->tpl_vars['order']->value['date_shipped'];?>

									<?php }?>
								</td>
								<td>
									<?php if ($_smarty_tpl->tpl_vars['order']->value['date_delivered']==null&&$_smarty_tpl->tpl_vars['order']->value['date_shipped']==null) {?>
										<button class="button btn deliver hidden">Deliver</button>
									<?php } elseif ($_smarty_tpl->tpl_vars['order']->value['date_delivered']==null) {?>
										<button class="button btn deliver">Deliver</button>
									<?php } else { ?>
										<?php echo $_smarty_tpl->tpl_vars['order']->value['date_delivered'];?>

									<?php }?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		<?php }?>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
