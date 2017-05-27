<?php /* Smarty version Smarty-3.1.15, created on 2017-05-27 04:12:41
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/failreset.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16285663045928eea984b658-02317642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '136261d12a294a903713db9a0d5c5915b6061802' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/failreset.tpl',
      1 => 1495854718,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16285663045928eea984b658-02317642',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5928eea99b3bb4_60802779',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5928eea99b3bb4_60802779')) {function content_5928eea99b3bb4_60802779($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="resetresult-body">
	<!-- Fail -->
	<h1>Failed password reset</h1>
	<hr>
	<div class="resetresult-content">
		<p>
		Your password could not be reset! Please try again later.
		</p>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
