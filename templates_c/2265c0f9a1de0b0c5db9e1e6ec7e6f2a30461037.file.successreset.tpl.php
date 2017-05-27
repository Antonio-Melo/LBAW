<?php /* Smarty version Smarty-3.1.15, created on 2017-05-27 04:12:53
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/successreset.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9410306265928eeb52846e5-35654904%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2265c0f9a1de0b0c5db9e1e6ec7e6f2a30461037' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/successreset.tpl',
      1 => 1495854664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9410306265928eeb52846e5-35654904',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5928eeb53f56f9_88840322',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5928eeb53f56f9_88840322')) {function content_5928eeb53f56f9_88840322($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="resetresult-body">
	<!-- Success -->
	<h1>Successful password reset</h1>
	<hr>
	<div class="resetresult-content">
		<p>
		Your password was reset successfully! Please login with your new password.
		</p>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
