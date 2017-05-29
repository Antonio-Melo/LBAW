<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 11:30:41
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/admin-stats.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2025343380592b9402ba2f82-47229072%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bc4fb13711e7648ef7c2991823105b740f61dce' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/admin-stats.tpl',
      1 => 1496053839,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2025343380592b9402ba2f82-47229072',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592b9402d57042_64528505',
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
    'rating' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592b9402d57042_64528505')) {function content_592b9402d57042_64528505($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="stats-body">
	<!-- Stats -->
	<h1>Stats</h1>
	<hr>
	<div class="stats-content">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th id="pid">ID <i class="fa fa-caret-down"></i></th>
						<th id="pname">Name <i class="fa fa-caret-down"></i></th>
						<th id="prating">Rating <i class="fa fa-caret-down"></i></th>
						<th id="pprice">Price <i class="fa fa-caret-down"></i></th>
						<th id="pstock">Stock <i class="fa fa-caret-down"></i></th>
						<th id="pviews">Nr. Views <i class="fa fa-caret-down"></i></th>
						<th id="pfavorites">Nr. Favorites <i class="fa fa-caret-down"></i></th>
						<th id="psales">Nr. Sales <i class="fa fa-caret-down"></i></th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
						<?php if ($_smarty_tpl->tpl_vars['product']->value['nr_ratings']==0) {?>
							<?php $_smarty_tpl->tpl_vars['rating'] = new Smarty_variable(0.00, null, 0);?>
						<?php } else { ?>
							<?php $_smarty_tpl->tpl_vars['rating'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['rating']/$_smarty_tpl->tpl_vars['product']->value['nr_ratings'], null, 0);?>
						<?php }?>
						
						<tr pid=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
 pname=<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
 prating=<?php echo $_smarty_tpl->tpl_vars['rating']->value;?>
 pprice=<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
 pstock=<?php echo $_smarty_tpl->tpl_vars['product']->value['stock'];?>
 pviews=<?php echo $_smarty_tpl->tpl_vars['product']->value['nr_views'];?>
 pfavorites=<?php echo $_smarty_tpl->tpl_vars['product']->value['nr_favorites'];?>
 psales=<?php echo $_smarty_tpl->tpl_vars['product']->value['nr_sales'];?>
>
							<td><?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
</td>
							<td><a href=<?php echo ("product.php?id=").($_smarty_tpl->tpl_vars['product']->value['id']);?>
><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a></td>
							<td><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['rating']->value);?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['product']->value['stock'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['product']->value['nr_views'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['product']->value['nr_favorites'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['product']->value['nr_sales'];?>
</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
